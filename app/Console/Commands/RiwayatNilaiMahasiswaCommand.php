<?php

namespace App\Console\Commands;

use App\Models\Prodi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\RiwayatNilaiMahasiswa;
use App\Jobs\SyncRiwayatNilaiMahasiswaJob;

class RiwayatNilaiMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:riwayat-nilai-mahasiswa-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Riwayat Nilai Mahasiswa dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Riwayat Nilai Mahasiswa...");
        $apiRequest = new ApiRequest();
        $limit = 500;
        $offset = 0;
        $totalProcessed = 0;

        while (true) {
            $this->info("Mengambil data mulai offset $offset...");

            $params = [
                'filter' => '',
                'order' => '',
                'limit' => $limit,
                'offset' => $offset,
            ];

            $response = $apiRequest->sendRequest('GetRiwayatNilaiMahasiswa', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data Riwayat Nilai Mahasiswa, untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    SyncRiwayatNilaiMahasiswaJob::dispatch($item)->delay(now()->addSeconds(10));
                    $this->info("Job untuk Riwayat Nilai Mahasiswa NIM: {$item['nim']} dikirim ke queue.");


                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk Riwayat Nilai Mahasiswa NIM: {$item['nim']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total data diproses: $totalProcessed");
        return Command::SUCCESS;

    }
}
