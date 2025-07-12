<?php

namespace App\Console\Commands\Refrens;

use Illuminate\Console\Command;
use App\Models\AlatTransportasi;
use App\Services\Api\ApiRequest;

class AlatTransportasiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:alat-transportasi-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Alat Transportasi dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Alat Transportasi...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetAlatTransportasi', $params);

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
                AlatTransportasi::updateOrCreate(
                    ['id_alat_transportasi' => $item['id_alat_transportasi']],
                    [
                        'nama_alat_transportasi' => $item['nama_alat_transportasi']
                    ]
                );

                $this->info("Data Alat Transportasi ID {$item['id_alat_transportasi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_alat_transportasi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
