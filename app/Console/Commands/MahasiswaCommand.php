<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Mahasiswa;
use App\Jobs\SyncMahasiswaJob;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class MahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mahasiswa-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data mahasiswa dari API ke database';

    public function handle()
    {
        $this->info("Memulai sinkronisasi data mahasiswa...");

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

            $response = $apiRequest->sendRequest('GetListMahasiswa', $params);

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
                    // SyncMahasiswaJob::dispatch($item);
                    SyncMahasiswaJob::dispatch($item)->delay(now()->addSeconds(10)); 

                    $this->info("Job untuk mahasiswa {$item['nama_mahasiswa']} dikirim ke queue.");
    
                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk mahasiswa {$item['nama_mahasiswa']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total mahasiswa diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
