<?php

namespace App\Console\Commands\Refrens;

use App\Models\JenisSms;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class JenisSmsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jenis-sms-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jenis Sms dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jenis Sms...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJenisSMS', $params);

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
                JenisSms::updateOrCreate(
                    ['id_jenis_sms' => $item['id_jenis_sms']],
                    [
                        'nama_jenis_sms' => $item['nama_jenis_sms'],
                    ]
                );

                $this->info("Data Jenis Sms ID {$item['id_jenis_sms']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data Jenis Sms ID {$item['id_jenis_sms']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}