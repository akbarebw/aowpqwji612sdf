<?php

namespace App\Console\Commands;

use App\Jobs\SyncAllPTJob;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class AllProfilPtCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:all-profil-pt-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi semua data profil perguruan tinggi dari API dan mengirimkan ke queue';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Semua Profil PT / Kampus...");

        $apiRequest = new ApiRequest();
        $limit = 500;
        $offset = 0;
        $totalProcessed = 0;

        while (true) {
            $this->info("Mengambil data mulai dari offset $offset...");

            $params = [
                'filter' => '',
                'order' => '',
                'limit' => $limit,
                'offset' => $offset,
            ];

            $response = $apiRequest->sendRequest('GetAllPT', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data Profil PT untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    SyncAllPTJob::dispatch($item)->delay(now()->addSeconds(5));

                    $this->info("Job untuk profil PT {$item['nama_perguruan_tinggi']} berhasil dikirim ke queue.");

                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk profil PT {$item['nama_perguruan_tinggi']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                // Data sudah habis
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total profil PT yang diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
