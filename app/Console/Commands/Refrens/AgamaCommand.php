<?php

namespace App\Console\Commands\Refrens;

use App\Models\Agama;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class AgamaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:agama-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Agama dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Sinkronisasi data Agama...');

        $apiRequest = new ApiRequest();


        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetAgama', $params);

        // Log error jika terjadi kesalahan saat memanggil API
        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
            return Command::FAILURE;
        }

        // Ambil data dari response
        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data yang ditemukan untuk disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {
            try {
                Agama::updateOrCreate(
                    [
                        'id_agama' => $item['id_agama'],
                        'nama_agama' => $item['nama_agama'],
                    ]
                );

                $this->info("Data agama ID {$item['nama_agama']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data agama ID {$item['nama_agama']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");

        return Command::SUCCESS;
    }
}
