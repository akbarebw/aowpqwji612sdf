<?php

namespace App\Console\Commands;

use App\Models\Prodi;
use Illuminate\Console\Command;
use App\Models\PesertaKelasKuliah;
use App\Services\Api\ApiRequest;
use Carbon\Carbon;

class PesertaKelasKuliahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:peserta-kelas-kuliah-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Peserta Kelas Kuliah dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Peserta Kelas Kuliah...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];


        $response = $apiRequest->sendRequest('GetPesertaKelasKuliah', $params);

        // token expired
        if($response['error_code'] == 100) {
            $this->error("Token expired.");
            return;
        }

        // Ambil data jika tidak ada error
        $data = $response['data'] ?? [];

        if (empty($data)) {
            $this->warn("Tidak ada data baru yang perlu disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {
            try {
                PesertaKelasKuliah::updateOrCreate(
                    ['id_kelas_kuliah' => $item['id_kelas_kuliah']],
                    [
                        'nama_kelas_kuliah' => $item['nama_kelas_kuliah'],
                        'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                        'id_mahasiswa' => $item['id_mahasiswa'],
                        'nim' => $item['nim'],
                        'nama_mahasiswa' => $item['nama_mahasiswa'],
                        'id_matkul' => $item['id_matkul'],
                        'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'angkatan' => $item['angkatan'],
                        'status_sync' => $item['status_sync'],
                    ]
                );
                $this->info("Sinkronkan data ID Peserta Kelas Kuliah {$item['id_kelas_kuliah']} berhasil disinkronkan.");
            }  catch (\Exception $e) {
                $this->error("Gagal sinkronkan data ID Matakuliah {$item['id_kelas_kuliah']}: " . $e->getMessage());
            }
        }
        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
