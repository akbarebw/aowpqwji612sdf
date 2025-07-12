<?php

namespace App\Console\Commands;

use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\DataLengkapMahasiswaProdi;
use App\Jobs\SyncDataLengkapMahasiswaProdiJob;

class DataLengkapMahasiswaProdiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:data-lengkap-mahasiswa-prodi-command';

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
        $this->info("Memulai sinkronisasi data Lengkap Mahasiswa Prodi...");

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

            $response = $apiRequest->sendRequest('GetDataLengkapMahasiswaProdi', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data Lengkap Mahasiswa Prodi untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    SyncDataLengkapMahasiswaProdiJob::dispatch($item)->delay(now()->addSeconds(10));  // Menunda eksekusi job 10 detik

                    $this->info("Job Data Lengkap Mahasiswa Prodi {$item['id_mahasiswa']} dikirim ke queue.");
    
                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk Lengkap Mahasiswa Prodi {$item['id_mahasiswa']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total Data Lengkap Mahasiswa Prodi Khusus diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
