<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ExportDataKelasPerkuliahan;
use App\Jobs\SyncExportDataKelasPerkuliahanJob;


class ExportDataKelasPerkuliahanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-kelas-perkuliahan-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Export Data Kelas Perkuliahan dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Export Data Kelas Perkuliahan...");

        $apiRequest = new ApiRequest();
        $limit = 100;
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

            $response = $apiRequest->sendRequest('ExportDataKelasPerkuliahan', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data Export Data Perkuliahan Kelas untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    // SyncMahasiswaJob::dispatch($item);
                    SyncExportDataKelasPerkuliahanJob::dispatch($item)->delay(now()->addSeconds(10)); 

                    $this->info("Job untuk Export Data Kelas Perkuliahan {$item['nama_mata_kulias']}  {$item['nama_program_studi']}  dikirim ke queue.");
    
                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk Export Data Kelas Perkuliahan {$item['nama_mata_kulias']} {$item['nama_program_studi']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total Export Data Kelas Perkuliahan diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
