<?php

namespace App\Console\Commands\Refrens;

use App\Models\JalurEvaluasi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class JalurEvaluasiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jalur-evaluasi-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jalur Evaluasi dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jalur Evaluasi...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJenisEvaluasi', $params);

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
                JalurEvaluasi::updateOrCreate(
                    [
                        'id_jenis_evaluasi' => $item['id_jenis_evaluasi'],
                        'nama_jenis_evaluasi' => $item['nama_jenis_evaluasi']
                    ]
                );

                $this->info("Data Jalur Evaluasi ID {$item['id_jenis_evaluasi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_jenis_evaluasi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
