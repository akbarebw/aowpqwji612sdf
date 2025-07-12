<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MahasiswaBimbinganDosen;
use App\Services\Api\ApiRequest;

class MahasiswaBimbinganDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mahasiswa-bimbingan-dosen-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Mahasiswa Bimbingan Dosen dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Mahasiswa Bimbingan Dosen...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetMahasiswaBimbinganDosen', $params);

        // Cek error dari response
        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat mengakses API: " . $response['error']);
            return Command::FAILURE; // Mengembalikan error status
        }

        // Ambil data jika tidak ada error
        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data baru yang perlu disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {
            try {
                MahasiswaBimbinganDosen::updateOrCreate(
                    ['id_bimbing_mahasiswa' => $item['id_bimbing_mahasiswa']],
                    [
                        'id_aktivitas' => $item['id_aktivitas'] ?? "",
                        'judul' => $item['judul'] ?? "",
                        'id_kategori_kegiatan' => $item['id_kategori_kegiatan'] ?? "",
                        'nama_kategori_kegiatan' => $item['nama_kategori_kegiatan'] ?? "",
                        'id_dosen' => $item['id_dosen'] ?? "",
                        'nidn' => $item['nidn'] ?? "",
                        'nama_dosen' => $item['nama_dosen'] ?? "",
                        'pembimbing_ke' => $item['pembimbing_ke'] ?? "",
                    ]
                );
                $this->info("Mahasiswa Bimbingan {$item['id_bimbing_mahasiswa']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan Mahasiswa Bimbingan {$item['id_bimbing_mahasiswa']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
