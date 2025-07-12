<?php

namespace App\Console\Commands;

use App\Models\DosenPembimbing;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class DosenPembimbingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dosen-pembimbing-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Dosen Pembimbing dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Dosen Pembimbing...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetDosenPembimbing', $params);
        
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
                DosenPembimbing::updateOrCreate(
                    [
                        'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                        'nama_mahasiswa' => $item['nama_mahasiswa'],
                        'nim' => $item['nim'],
                        'id_dosen' => $item['id_dosen'],
                        'nidn' => $item['nidn'],
                        'nama_dosen' => $item['nama_dosen'],
                        'pembimbing_ke' => $item['pembimbing_ke'],
                        'jenis_aktivitas' => $item['jenis_aktivitas'],
                    ]
                );
                $this->info("Data dosen pembimbing ID {$item['id_registrasi_mahasiswa']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data dosen pembimbing ID {$item['id_registrasi_mahasiswa']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
