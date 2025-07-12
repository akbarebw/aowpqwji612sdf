<?php

namespace App\Console\Commands\Refrens;

use App\Models\JalurMasuk;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class JalurMasukCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jalur-masuk-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jalur Masuk dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jalur Masuk...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJalurMasuk', $params);

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
                JalurMasuk::updateOrCreate(
                    ['id_jalur_masuk' => $item['id_jalur_masuk']],
                    [
                        'nama_jalur_masuk' => $item['nama_jalur_masuk']
                    ]
                );

                $this->info("Data Jalur Masuk ID {$item['id_jalur_masuk']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_jalur_masuk']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
