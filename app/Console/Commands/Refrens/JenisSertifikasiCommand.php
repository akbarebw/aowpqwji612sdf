<?php

namespace App\Console\Commands\Refrens;

use App\Models\JenisSertifikat;
use Illuminate\Console\Command;
use App\Models\JenisSertifikasi;
use App\Services\Api\ApiRequest;

class JenisSertifikasiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jenis-sertifikasi-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jenis Sertifikasi dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jenis Sertifikasi...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJenisSertifikasi', $params);

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
                JenisSertifikasi::updateOrCreate(
                    ['id_jenis_sertifikasi' => $item['id_jenis_sertifikasi']],
                    [
                        'nama_jenis_sertifikasi' => $item['nama_jenis_sertifikasi']
                    ]
                );

                $this->info("Data Jenis Sertifikasi ID {$item['id_jenis_sertifikasi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk Jenis Sertifikasi ID {$item['id_jenis_sertifikasi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
