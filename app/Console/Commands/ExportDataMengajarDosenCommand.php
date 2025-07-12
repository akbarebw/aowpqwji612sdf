<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ExportDataMengajarDosen;


class ExportDataMengajarDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-mengajar-dosen-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Export Data Mengajar Dosen dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Export Data Mengajar Dosen...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "5",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('ExportDataMengajarDosen', $params);

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
                ExportDataMengajarDosen::updateOrCreate(
                    ['id_prodi' => $item['id_prodi']],
                    [
                        'nama_program_studi' => $item['nama_program_studi'],
                        'id_periode' => $item['id_periode'],
                        'nama_periode' => $item['nama_periode'],
                        'id_registrasi_dosen' => $item['id_registrasi_dosen'],
                        'nidn' => $item['nidn'],
                        'nama_dosen' => $item['nama_dosen'],
                        'id_matkul' => $item['id_matkul'],
                        'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                        'id_kelas_kuliah' => $item['id_kelas_kuliah'],
                        'nama_kelas_kuliah' => $item['nama_kelas_kuliah'],
                        'sks_mata_kuliah' => $item['sks_mata_kuliah'],
                        'rencana_minggu_pertemuan' => $item['rencana_minggu_pertemuan'],
                        'realisasi_minggu_pertemuan' => $item['realisasi_minggu_pertemuan'],
                        'status_sync' => $item['status_sync'],
                    ]
                );

                $this->info("Data Export Data Mengajar Dosen  ID {$item['id_prodi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data Export Data Mengajar Dosen ID {$item['id_prodi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}