<?php

namespace App\Console\Commands\Refrens;


use App\Models\TingkatPrestasi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class TingkatPrestasiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tingkat-prestasi-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Tingkat Prestasi dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Tingkat Prestasi...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetTingkatPrestasi', $params);

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
                TingkatPrestasi::updateOrCreate(
                    ['id_tingkat_prestasi' => $item['id_tingkat_prestasi']],
                    [
                        'nama_tingkat_prestasi' => $item['nama_tingkat_prestasi']
                    ]
                );

                $this->info("Data Tingkat Prestasi ID {$item['id_tingkat_prestasi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_tingkat_prestasi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}