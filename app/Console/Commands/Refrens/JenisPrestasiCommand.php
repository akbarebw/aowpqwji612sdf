<?php

namespace App\Console\Commands\Refrens;

use App\Models\JenisPrestasi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class JenisPrestasiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jenis-prestasi-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jenis Prestasi dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jenis Prestasi...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJenisPrestasi', $params);

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
                JenisPrestasi::updateOrCreate(
                    ['id_jenis_prestasi' => $item['id_jenis_prestasi']],
                    [
                        'nama_jenis_prestasi' => $item['nama_jenis_prestasi']
                    ]
                );

                $this->info("Data Jenis Prestasi ID {$item['id_jenis_prestasi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk Jenis Prestasi ID {$item['id_jenis_prestasi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
