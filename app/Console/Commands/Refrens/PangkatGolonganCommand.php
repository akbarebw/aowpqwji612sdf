<?php

namespace App\Console\Commands\Refrens;

use App\Models\PangkatGolongan;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class PangkatGolonganCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:pangkat-golongan-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Pangkat Golongan dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Pangkat Golongan...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetPangkatGolongan', $params);

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
                PangkatGolongan::updateOrCreate(
                    ['id_pangkat_golongan' => $item['id_pangkat_golongan']],
                    [
                        'kode_golongan' => $item['kode_golongan'],
                        'nama_pangkat' => $item['nama_pangkat']
                    ]
                );

                $this->info("Data Pangkat Golongan ID {$item['id_pangkat_golongan']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_pangkat_golongan']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
