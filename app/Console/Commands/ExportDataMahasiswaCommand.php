<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ExportDataMahasiswa;



class ExportDataMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-mahasiswa-command';

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
        $this->info("Memulai sinkronisasi eksport data mahasiswa...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];
        $response = $apiRequest->sendRequest('ExportDataMahasiswa', $params);
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
                ExportDataMahasiswa::updateOrCreate(
                    ['angkatan' => $item['angkatan']],
                    [

                        'id_mahasiswa' => $item['id_mahasiswa'],
                        'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'] ?? '',
                        'nim' => $item['nim'] ?? '',
                        'nama_mahasiswa' => $item['nama_mahasiswa'],
                        'id_prodi' => $item['id_prodi'],
                        'program_studi' => $item['program_studi'],
                        'periode_masuk' => $item['periode_masuk'],
                        'status_mahasiswa' => $item['status_mahasiswa'],
                        'id_jenis_daftar' => $item['id_jenis_daftar'],
                        'nama_jenis_daftar' => $item['nama_jenis_daftar'],
                        'jenis_kelamin' => $item['jenis_kelamin'],
                        'tempat_lahir' => $item['tempat_lahir'],
                        'tanggal_lahir' => $item['tanggal_lahir'],
                        'id_agama' => $item['id_agama'],
                        'nama_agama' => $item['nama_agama'],
                        'status_sync' => $item['status_sync'],
                    ]

                );
                $this->info("Data Export Data Mahasiswa ID {$item['angkatan']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data dosen ID {$item['angkatan']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}

