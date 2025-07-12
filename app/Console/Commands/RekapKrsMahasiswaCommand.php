<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\RekapKrsMahasiswa;

class RekapKrsMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rekap-krs-mahasiswa-command';

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
        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetRekapKRSMahasiswa', $params);

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
            
                RekapKrsMahasiswa::updateOrCreate(
                    [
                        'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                        'id_matkul' => $item['id_matkul'],
                        'id_periode' => $item['id_periode']
                    ],
                    [
                        'id_prodi' => $item['id_prodi'] ?? "",
                        'nama_program_studi' => $item['nama_program_studi'] ?? "",
                        'nama_periode' => $item['nama_periode'] ?? "",
                        'nim' => $item['nim'] ?? "",
                        'nama_mahasiswa' => $item['nama_mahasiswa'] ?? "",
                        'angkatan' => $item['angkatan'] ?? "",
                        'id_semester' => $item['id_semester'] ?? "",
                        'kode_mata_kuliah' => $item['kode_mata_kuliah'] ?? "",
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'] ?? "",
                        'sks_mata_kuliah' => $item['sks_mata_kuliah'] ?? "",
                    ]
                );

                $this->info("Data Rekap Krs ID {$item['id_registrasi_mahasiswa']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data Rekap Krs ID {$item['id_registrasi_mahasiswa']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
