<?php

namespace App\Console\Commands\Refrens;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\LembagaPengangkat;

class LembagaPengangkatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:lembaga-pengangkat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Lembaga Pengangkat dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Lembaga Pengangkat...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetLembagaPengangkat', $params);

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
                LembagaPengangkat::updateOrCreate(
                    ['id_lembaga_angkat' => $item['id_lembaga_angkat']],
                    [
                        'nama_lembaga_angkat' => $item['nama_lembaga_angkat']
                    ]
                );

                $this->info("Data Lembaga Pengangkat ID {$item['id_lembaga_angkat']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_lembaga_angkat']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
