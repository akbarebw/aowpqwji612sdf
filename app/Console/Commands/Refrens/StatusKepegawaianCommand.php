<?php

namespace App\Console\Commands\Refrens;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\StatusKepegawaian;

class StatusKepegawaianCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:status-kepegawaian-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Status Kepegawaian dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Status Kepegawaian...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetStatusKepegawaian', $params);

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
                StatusKepegawaian::updateOrCreate(
                    [
                        'id_status_pegawai' => $item['id_status_pegawai'],
                        'nama_status_pegawai' => $item['nama_status_pegawai']
                    ]
                );

                $this->info("Data Status Kepegawaian ID {$item['id_status_pegawai']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_status_pegawai']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
