<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Prodi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\DetailKelasKuliah;
use App\Jobs\SyncDetailKelasKuliahJob;

class DetailKelasKuliahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:detail-kelas-kuliah-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Detail Kelas Kuliah dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Detail Kelas Kuliah...");

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

            $response = $apiRequest->sendRequest('GetDetailKelasKuliah', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data DetailKelas Kuliah untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    // SyncMahasiswaJob::dispatch($item);
                    SyncDetailKelasKuliahJob::dispatch($item)->delay(now()->addSeconds(10)); 

                    $this->info("Job untuk Detail Kelas Kuliah {$item['nama_semester']} {$item['nama_semester']} dikirim ke queue.");
    
                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk mah Detail Kelas Kuliahasiswa {$item['nama_semester']} {$item['nama_semester']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total Detail Kelas Kuliah diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
