<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Prodi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\DosenPengajarKelasKuliah;

class DosenPengajarKelasKuliahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dosen-pengajar-kelas-kuliah-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Dosen Pengajar Kelas Kuliah dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Dosen Pengajar Kelas Kuliah...");

        $apiRequest = new ApiRequest();

        $prodiList = Prodi::all();

        if($prodiList->isEmpty()) {
            $this->error("Tidak ada data Prodi.");
            return;
        }

        foreach ($prodiList as $prod) {
            $id_prodi = $prod->id_prodi;
            $params = [
                "filter" => "id_prodi='$id_prodi'",
                'order' => '',
                'limit' => '',
                'offset' => '',
            ];

            $response = $apiRequest->sendRequest('GetDosenPengajarKelasKuliah', $params);

            // Cek error pada respons API

            // token expired
            if($response['error_code'] == 100) {
                $this->error("Token expired.");
                return;
            }

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat mengakses API untuk Prodi ID {$prod->id_prodi}: " . $response['error']);
                continue;
            }

            $data = $response['data'] ?? [];

            if (empty($data)) {
                $this->warn("Tidak ada data baru untuk Prodi ID {$prod->id_prodi}.");
                continue;
            }

            foreach ($data as $item) {
                try {
                    DosenPengajarKelasKuliah::updateOrCreate(
                        ['id_aktivitas_mengajar' => $item['id_aktivitas_mengajar'], 'id_prodi' => $prod->id_prodi], 
                        [
                            'id_registrasi_dosen' => $item['id_registrasi_dosen'],
                            'id_dosen' => $item['id_dosen'] ,
                            'nidn' => $item['nidn'] ,
                            'nama_dosen' => $item['nama_dosen'] ,
                            'id_kelas_kuliah' => $item['id_kelas_kuliah'] ,
                            'nama_kelas_kuliah' => $item['nama_kelas_kuliah'] ,
                            'id_substansi' => $item['id_substansi'] ,
                            'sks_substansi_total' => $item['sks_substansi_total'] ,
                            'rencana_minggu_pertemuan' => $item['rencana_minggu_pertemuan'] ,
                            'realisasi_minggu_pertemuan' => $item['realisasi_minggu_pertemuan'] ,
                            'id_jenis_evaluasi' => $item['id_jenis_evaluasi'] ,
                            'nama_jenis_evaluasi' => $item['nama_jenis_evaluasi'] ,
                            'id_prodi' => $item['id_prodi'] ,
                            'id_semester' => $item['id_semester'] ,
                        ]
                    );
                    $this->info("Data Dosen Pengajar Kelas Kuliah ID {$item['id_aktivitas_mengajar']} berhasil disinkronkan.");
                } catch (\Exception $e) {
                    $this->error("Gagal sinkronkan data Dosen Pengajar Kelas Kuliah ID {$item['id_aktivitas_mengajar']}: " . $e->getMessage());
                }
            }
        }       
        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}