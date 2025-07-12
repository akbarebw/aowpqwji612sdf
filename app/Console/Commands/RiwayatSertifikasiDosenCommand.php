<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\RiwayatSertifikasiDosen;

class RiwayatSertifikasiDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:riwayat-sertifikasi-dosen-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Riwayat Sertifikasi Dosen...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetRiwayatSertifikasiDosen', $params);

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
                RiwayatSertifikasiDosen::updateOrCreate(
                    ['id_dosen' => $item['id_dosen']],
                    [
                        'nidn' => $item['nidn'],
                        'nama_dosen' => $item['nama_dosen'],
                        'nomor_peserta' => $item['nomor_peserta'],
                        'id_bidang_studi' => $item['id_bidang_studi'],
                        'nama_bidang_studi' => $item['nama_bidang_studi'],
                        'id_jenis_sertifikasi' => $item['id_jenis_sertifikasi'],
                        'nama_jenis_sertifikasi' => $item['nama_jenis_sertifikasi'],
                        'tahun_sertifikasi' => $item['tahun_sertifikasi'],
                        'sk_sertifikasi' => $item['sk_sertifikasi']
                    ]
                );

                $this->info("Data Riwayat Sertifikasi Dosen ID {$item['id_dosen']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_dosen']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
