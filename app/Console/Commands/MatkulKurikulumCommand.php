<?php

namespace App\Console\Commands;

use App\Models\Prodi;
use App\Models\MatkulKurikulum;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Jobs\SyncMatkulKurikulumJob;

class MatkulKurikulumCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:matkul-kurikulum-command';

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
        $this->info("Memulai sinkronisasi data Matakuliah...");

        $apiRequest = new ApiRequest();
        // GetMatkulKurikulum

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

            $response = $apiRequest->sendRequest('GetMatkulKurikulum', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data Matakuliah Kurikulum, untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    SyncMatkulKurikulumJob::dispatch($item)->delay(now()->addSeconds(10));

                    $this->info("Job untuk Matakuliah Kurikulum {$item['id_semester']} {$item['id_kurikulum']} dikirim ke queue.");

                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk Kurikulum {$item['id_semester']} {$item['id_kurikulum']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total MataKuliah Kurikulum diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
