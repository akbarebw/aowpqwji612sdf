<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ListAktivitasMahasiswa;
use App\Jobs\SyncListAktivitasMahasiswaJob;

class ListAktivitasMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-aktivitas-mahasiswa-command';

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
        $this->info("Memulai sinkronisasi data List Aktivitas Mahasiswa...");

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

            $response = $apiRequest->sendRequest('GetListAktivitasMahasiswa', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data List Aktivitas Mahasiswa untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    // SyncMahasiswaJob::dispatch($item);
                    SyncListAktivitasMahasiswaJob::dispatch($item)->delay(now()->addSeconds(10)); 

                    $this->info("Job untuk List Aktivitas Mahasiswa  {$item['nama_jenis_aktivitas']} dikirim ke queue.");
    
                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk mah List Aktivitas Mahasiswa {$item['nama_jenis_aktivitas']} : " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total List Aktivitas Mahasiswa yang diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
