<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ExportDataPenugasanDosen;

class ExportDataPenugasanDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-penugasan-dosen-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Export Data Penugasan Dosen dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Export Data Penugasan Dosen...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('ExportDataPenugasanDosen', $params);

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
                ExportDataPenugasanDosen::updateOrCreate(
                    ['id_registrasi_dosen' => $item['id_registrasi_dosen']],
                    [
                        'nidn' => $item['nidn'],
                        'nama_dosen' => $item['nama_dosen'],
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'periode_mengajar' => $item['periode_mengajar'],
                        'jenis_kelamin' => $item['jenis_kelamin'],
                        'tempat_lahir' => $item['tempat_lahir'],
                        'tanggal_lahir' => $item['tanggal_lahir'],
                        'id_agama' => $item['id_agama'],
                        'nama_agama' => $item['nama_agama'],

                    ]
                );

                $this->info("Data Export Data Penugasan Dosen ID {$item['id_registrasi_dosen']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data Export Data Penugasan Dosen ID {$item['id_registrasi_dosen']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
