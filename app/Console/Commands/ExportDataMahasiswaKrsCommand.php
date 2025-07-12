<?php

namespace App\Console\Commands;

use App\Jobs\SyncMahasiswaJob;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ExportDataMahasiswaKrs;
use App\Jobs\SyncExportDataMahasiswaKrsCommandJob;

class ExportDataMahasiswaKrsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-mahasiswa-krs-command';

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
        $this->info("Memulai sinkronisasi data Export Data Mahasiswa KRS...");

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

            $response = $apiRequest->sendRequest('ExportDataMahasiswaKRS', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data Export Data Krs Mahasiswa untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    // SyncMahasiswaJob::dispatch($item);
                    SyncExportDataMahasiswaKrsCommandJob::dispatch($item)->delay(now()->addSeconds(10));

                    $this->info("Job untuk Krs Mahasiswa  {$item['nama_mahasiswa']} {$item['nama_mata_kuliah']} dikirim ke queue.");

                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk mah Krs Mahasiswa {$item['nama_mahasiswa']} {$item['nama_mata_kuliah']} : " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total Export Data Krs Mahasiswa yang diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
