<?php

namespace App\Console\Commands\Refrens;

use App\Models\LevelWilayah;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;


class LevelWilayahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:level-wilayah-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Level Wilayah dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Level Wilayah...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetLevelWilayah', $params);

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
               LevelWilayah::updateOrCreate(
                    ['id_level_wilayah' => $item['id_level_wilayah']],
                    [
                        'nama_level_wilayah' => $item['nama_level_wilayah']
                    ]
                );

                $this->info("Data Level Wilayah {$item['id_level_wilayah']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_level_wilayah']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
