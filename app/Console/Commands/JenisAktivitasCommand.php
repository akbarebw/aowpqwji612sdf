<?php

namespace App\Console\Commands;


use App\Models\JenisAktivitas;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class JenisAktivitasCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jenis-aktivitas-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jenis Aktivitas dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jenis Aktivitas...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJenisAktivitasMahasiswa', $params);

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
                JenisAktivitas::updateOrCreate(
                    ['id_jenis_aktivitas' => $item['id_jenis_aktivitas_mahasiswa']],
                    [
                        'nama_jenis_aktivitas' => $item['nama_jenis_aktivitas_mahasiswa'],
                        'untuk_kampus_merdeka' => $item['untuk_kampus_merdeka'],

                    ]
                );

                $this->info("Data Jenis Aktivitas ID {$item['id_jenis_aktivitas_mahasiswa']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_jenis_aktivitas_mahasiswa']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}