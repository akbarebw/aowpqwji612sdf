<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ExportDataNilaiTransfer;

class ExportDataNilaiTransferCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-nilai-transfer-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Export Data Nilai Transfer dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Export Data Nilai Transfer...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('ExportDataNilaiTransfer', $params);

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
                ExportDataNilaiTransfer::updateOrCreate(
                    ['id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa']],
                    [
                        'periode' => $item['periode'],
                        'id_mahasiswa' => $item['id_mahasiswa'],
                        'nim' => $item['nim'],
                        'nama_mahasiswa' => $item['nama_mahasiswa'],
                        'id_prodi' => $item['id_prodi'],
                        'program_studi' => $item['program_studi'],
                        'angkatan' => $item['angkatan'],
                        'id_transfer' => $item['id_transfer'],
                        'kode_matkul_asal' => $item['kode_matkul_asal'],
                        'nama_mata_kuliah_asal' => $item['nama_mata_kuliah_asal'],
                        'sks_mata_kuliah_asal' => $item['sks_mata_kuliah_asal'],
                        'nilai_huruf_asal' => $item['nilai_huruf_asal'],
                        'kode_matkul_baru' => $item['kode_matkul_baru'],
                        'nama_mata_kuliah_baru' => $item['nama_mata_kuliah_baru'],
                        'sks_mata_kuliah_diakui' => $item['sks_mata_kuliah_diakui'],
                        'nilai_huruf_diakui' => $item['nilai_huruf_diakui'],
                        'nilai_angka_diakui' => $item['nilai_angka_diakui'],
                        'status_sync' => $item['status_sync'],
                    ]
                );

                $this->info("Data Export Data Nilai Transfer  ID {$item['id_registrasi_mahasiswa']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data Export Data Nilai Transfer ID {$item['id_registrasi_mahasiswa']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
