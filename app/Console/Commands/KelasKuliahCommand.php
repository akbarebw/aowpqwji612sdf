<?php

namespace App\Console\Commands;

use App\Models\Prodi;
use App\Models\KelasKuliah;
use Illuminate\Console\Command;
use App\Jobs\SyncKelasKuliahJob;
use App\Services\Api\ApiRequest ;


class KelasKuliahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kelas-kuliah-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Kelas Kuliah dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Kelas Kuliah...");

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

            $response = $apiRequest->sendRequest('GetListKelasKuliah', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data List Kelas Kuliah untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    SyncKelasKuliahJob::dispatch($item)->delay(now()->addSeconds(10)); 

                    $this->info("Job untuk list Kelas Kuliah {$item['nama_kelas_kuliah'] } dikirim ke queue.");
    
                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk list Kelas Kuliah {$item['nama_kelas_kuliah'] }: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total List Kelas Kuliah yang diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
