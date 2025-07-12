<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ListNilaiPerkuliahanKelas;
use App\Jobs\SyncListNilaiPerkuliahanKelasJob;

class ListNilaiPerkuliahanKelasCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-nilai-perkuliahan-kelas-command';

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
        $this->info("Memulai sinkronisasi data List Nilai Perkuliahan Kelas...");

        $apiRequest = new ApiRequest();
        $limit = 20;
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

            $response = $apiRequest->sendRequest('GetListNilaiPerkuliahanKelas', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data List Nilai Perkuliahan Kelas untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    // SyncMahasiswaJob::dispatch($item);
                    SyncListNilaiPerkuliahanKelasJob::dispatch($item)->delay(now()->addSeconds(10));

                    $this->info("Job untuk list Nilai perkuliahan Mahasiswa {$item['nama_mata_kuliah'] } {$item['nama_kelas_kuliah']} dikirim ke queue.");

                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk list Nilai Perkuliahan Mahasiswa  {$item['nama_mata_kuliah'] } {$item['nama_kelas_kuliah']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total List Nilai Perkuliahan Mahasiswa diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
