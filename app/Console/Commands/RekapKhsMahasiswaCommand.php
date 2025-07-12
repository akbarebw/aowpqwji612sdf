<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\RekapKhsMahasiswa;
use App\Jobs\SyncRekapKhsMahasiswaJob;

class RekapKhsMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rekap-khs-mahasiswa-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Rekap KHS Mahasiswa...");


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

            $response = $apiRequest->sendRequest('GetRekapKHSMahasiswa', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data Rekap Khs Mahasiswa, untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    SyncRekapKhsMahasiswaJob::dispatch($item)->delay(now()->addSeconds(10));

                    $this->info("Job untuk Rekap Khs Mahasiswa {$item['nim']} {$item['id_matkul']} dikirim ke queue.");

                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk Kurikulum {$item['nim']} {$item['id_matkul']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total Rekap Khs Mahasiswa diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
