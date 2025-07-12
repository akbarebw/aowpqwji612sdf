<?php

namespace App\Console\Commands\Refrens;

use App\Models\Wilayah;
use App\Jobs\SyncWilayahJob;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class WilayahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:wilayah-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Wilayah dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Wilayah...");

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

            $response = $apiRequest->sendRequest('GetWilayah', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data mahasiswa untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    SyncWilayahJob::dispatch($item)->delay(now()->addSeconds(10));  // Menunda eksekusi job 10 detik

                    $this->info("Job untuk wilayah {$item['nama_wilayah']} dikirim ke queue.");
    
                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk wilayah {$item['nama_wilayah']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total wilayah diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
