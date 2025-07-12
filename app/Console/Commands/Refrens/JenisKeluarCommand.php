<?php

namespace App\Console\Commands\Refrens;

use App\Models\JenisKeluar;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class JenisKeluarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jenis-keluar-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jenis Keluar dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jenis Keluar...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJenisKeluar', $params);

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
                JenisKeluar::updateOrCreate(
                    [
                        'id_jenis_keluar' => $item['id_jenis_keluar'],
                        'jenis_keluar' => $item['jenis_keluar'],
                        'apa_mahasiswa' => $item['apa_mahasiswa'],
                    ]
                );
                $this->info("Data Jenis Keluar ID {$item['id_jenis_keluar']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data Jenis Keluar ID {$item['id_jenis_keluar']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
