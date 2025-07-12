<?php

namespace App\Console\Commands\Refrens;

use App\Models\JenisSubtansi;
use App\Models\JenisSubstansi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class JenisSubstansiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jenis-substansi-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jenis Substansi dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jenis Substansi...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJenisSubstansi', $params);

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
                JenisSubstansi::updateOrCreate(
                    ['id_jenis_substansi' => $item['id_jenis_substansi']],
                    [
                        'nama_jenis_substansi' => $item['nama_jenis_substansi']
                    ]
                );

                $this->info("Data Jenis Substansi ID {$item['id_jenis_substansi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk Jenis Substansi ID {$item['id_jenis_substansi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
