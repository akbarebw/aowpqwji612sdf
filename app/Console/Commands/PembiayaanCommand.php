<?php

namespace App\Console\Commands;

use App\Models\Pembiayaan;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class PembiayaanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:pembiayaan-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Pembiayaan dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Pembiayaan...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetPembiayaan', $params);

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

        // Proses data untuk disimpan
        foreach ($data as $item) {
            try {
                Pembiayaan::updateOrCreate(
                    ['id_pembiayaan' => $item['id_pembiayaan']],
                    [
                        'nama_pembiayaan' => $item['nama_pembiayaan'],
                    ]
                );

                $this->info("Data Pembiayaan ID {$item['id_pembiayaan']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data Pembiayaan ID {$item['id_pembiayaan']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
