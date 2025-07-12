<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\NilaiTransferPendidikanMahasiswa;

class NilaiTransferPendidikanMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:nilai-transfer-pendidikan-mahasiswa-command';

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
        $this->info("Memulai sinkronisasi data transfer pendidikan mahasiswa...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetNilaiTransferPendidikanMahasiswa', $params);

        // Log error jika terjadi kesalahan saat memanggil API
        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
            return Command::FAILURE;
        }

        // Ambil data dari response
        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data yang ditemukan untuk disinkronkan.");
            return Command::SUCCESS;
        }

        // Proses data untuk disimpan
        foreach ($data as $item) {
            try {
                NilaiTransferPendidikanMahasiswa::updateOrCreate(
                    ['id_transfer' => $item['id_transfer']],
                    [
                        'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                        'nim' => $item['nim'],
                        'nama_mahasiswa' => $item['nama_mahasiswa'],
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'id_periode_masuk' => $item['id_periode_masuk'],
                        'kode_mata_kuliah_asal' => $item['kode_mata_kuliah_asal'],
                        'nama_mata_kuliah_asal' => $item['nama_mata_kuliah_asal'],
                        'sks_mata_kuliah_asal' => $item['sks_mata_kuliah_asal'],
                        'nilai_huruf_asal' => $item['nilai_huruf_asal'],
                        'id_matkul' => $item['id_matkul'],
                        'kode_matkul_diakui' => $item['kode_matkul_diakui'],
                        'nama_mata_kuliah_diakui' => $item['nama_mata_kuliah_diakui'],
                        'sks_mata_kuliah_diakui' => $item['sks_mata_kuliah_diakui'],
                        'nilai_huruf_diakui' => $item['nilai_huruf_diakui'],
                        'nilai_angka_diakui' => $item['nilai_angka_diakui'],
                        'id_perguruan_tinggi' => $item['id_perguruan_tinggi'],
                        'id_aktivitas' => $item['id_aktivitas'],
                        'judul' => $item['judul'],
                        'id_jenis_aktivitas' => $item['id_jenis_aktivitas'],    
                        'nama_jenis_aktivitas' => $item['nama_jenis_aktivitas'],
                        'id_semester' => $item['id_semester'],
                        'nama_semester' => $item['nama_semester'],
                        'status_sync' => $item['status_sync'],
                    ]
                );

                $this->info("Data Nilai Transfer Pendidikan Mahasiswa ID {$item['id_transfer']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data Nilai Transfer Pendidikan Mahasiswa ID {$item['id_transfer']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
