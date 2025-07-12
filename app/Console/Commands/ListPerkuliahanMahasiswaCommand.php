<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ListPerkuliahanMahasiswa;
use App\Jobs\SyncListPerkuliahanMahasiswaJob;


class ListPerkuliahanMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-perkuliahan-mahasiswa-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data List Perkuliahan Mahasiswa dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data List Perkuliahan Mahasiswa...");

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

            $response = $apiRequest->sendRequest('GetListPerkuliahanMahasiswa', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            $data = $response['data'] ?? [];
            $count = count($data);

            if ($count === 0) {
                $this->info("Tidak ada lagi data List Perkuliahan Mahasiswa untuk disinkronkan.");
                break;
            }

            foreach ($data as $item) {
                try {
                    SyncListPerkuliahanMahasiswaJob::dispatch($item)->delay(now()->addSeconds(10));  // Menunda eksekusi job 10 detik

                    $this->info("Job untuk Perkuliahan Mahasiswa {$item['nama_mahasiswa']}, {$item['nama_program_studi']} dikirim ke queue.");

                    $totalProcessed++;
                } catch (\Exception $e) {
                    $this->error("Gagal mengirim job untuk List Perkuliahan Mahasiswa {$item['nama_mahasiswa']}, {$item['nama_program_studi']}: " . $e->getMessage());
                }
            }

            if ($count < $limit) {
                break;
            }

            $offset += $limit;
        }

        $this->info("Sinkronisasi selesai. Total List Perkuliahan Mahasiswa diproses: $totalProcessed");
        return Command::SUCCESS;
    }
}
