<?php

namespace App\Console\Commands\Refrens;

use App\Models\StatusMahasiswa;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class StatusMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:status-mahasiswa-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Status Mahasiswa dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Status Mahasiswa...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetStatusMahasiswa', $params);

        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
            return Command::FAILURE;
        }

        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data untuk disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {
            try {
               StatusMahasiswa::updateOrCreate(
                    ['id_status_mahasiswa' => $item['id_status_mahasiswa']],
                    [
                        'nama_status_mahasiswa' => $item['nama_status_mahasiswa']
                    ]
                );

                $this->info("Data Status Mahasiswa ID {$item['id_status_mahasiswa']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_status_mahasiswa']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
    
}