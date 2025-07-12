<?php

namespace App\Console\Commands\Refrens;

use App\Models\KebutuhanKhusus;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Jobs\SyncKebutuhanKhususJob;


class KebutuhanKhususCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kebutuhan-khusus';

    /**
     * The console command description.
     *
     * @var string
     */ 
    protected $description = 'Sinkronisasi data Kebutuhan Khusus dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Kebutuhan Khusus...");

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

            $response = $apiRequest->sendRequest('GetKebutuhanKhusus', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data Kebutuhan Khusus untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    SyncKebutuhanKhususJob::dispatch($item)->delay(now()->addSeconds(10));  // Menunda eksekusi job 10 detik

                    $this->info("Job untuk kebutuhan_khusus {$item['nama_kebutuhan_khusus']} dikirim ke queue.");
    
                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk Kebutuhan Khusus {$item['nama_kebutuhan_khusus']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total Kebutuhan Khusus diproses: $totalProcessed");
        return Command::SUCCESS;
    }
    
}
