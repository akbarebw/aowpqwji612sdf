<?php

namespace App\Console\Commands\Refrens;

use App\Models\JenisTinggal;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class JenisTinggalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jenis-tinggal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jenis Tinggal dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jenis Tinggal...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJenisTinggal', $params);

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
                JenisTinggal::updateOrCreate(
                    ['id_jenis_tinggal' => $item['id_jenis_tinggal']],
                    [
                        'nama_jenis_tinggal' => $item['nama_jenis_tinggal']
                    ]
                );

                $this->info("Data Jenis Tinggal ID {$item['id_jenis_tinggal']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_jenis_tinggal']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
