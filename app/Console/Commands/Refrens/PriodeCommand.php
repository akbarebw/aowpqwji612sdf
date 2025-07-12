<?php

namespace App\Console\Commands\Refrens;

use App\Models\Prodi;
use App\Models\Periode;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class PriodeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:priode-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Priode dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Priode...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetPeriode', $params);

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
                Periode::updateOrCreate(
                    ['id_prodi' => $item['id_prodi']],
                    [
                        'kode_prodi' => $item['kode_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'status_prodi' => $item['status_prodi'],
                        'jenjang_pendidikan' => $item['jenjang_pendidikan'],
                        'periode_pelaporan' => $item['periode_pelaporan'],
                        'tipe_periode' => $item['tipe_periode']
                    ]
                );

                $this->info("Data Priode ID {$item['id_prodi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_prodi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
