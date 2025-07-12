<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Jobs\SyncDetailNilaiPerkuliahanKelasJob;

class DetailNilaiPerkuliahanKelasCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:detail-nilai-perkuliahan-kelas-command';

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
        $this->info("Memulai sinkronisasi data Detail Nilai Perkuliahan Kelas...");

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

            $response = $apiRequest->sendRequest('GetDetailNilaiPerkuliahanKelas', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data Detail Nilai Perkuliahan Kelas untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    // SyncMahasiswaJob::dispatch($item);
                    SyncDetailNilaiPerkuliahanKelasJob::dispatch($item)->delay(now()->addSeconds(10)); 

                    $this->info("Job untuk Detail Nilai Perkuliahan Kelas  {$item['nama_kelas_kuliah']} {$item['nama_mata_kuliah']} dikirim ke queue.");
    
                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk mah Detail Nilai Perkuliahan Kelas {$item['nama_kelas_kuliah']} {$item['nama_mata_kuliah']} : " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total Detail Nilai Perkuliahan Kelas Kuliah diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
