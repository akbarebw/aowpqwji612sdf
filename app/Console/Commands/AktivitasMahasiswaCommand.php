<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command; 
use App\Models\Prodi;
use App\Models\AktivitasMahasiswa;
use App\Services\Api\ApiRequest;

class AktivitasMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:aktivitas-mahasiswa-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Aktivitas Mahasiswa dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Aktivitas Mahasiswa...");

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

            $response = $apiRequest->sendRequest('GetListAktivitasMahasiswa', $params);

            // Cek error pada respons API

            // token expired
            if($response['error_code'] == 100) {
                $this->error("Token expired.");
                return;
            }

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat mengakses API: " . $response['error']);
                return Command::FAILURE; 
            }

            $data = $response['data'] ?? [];
            if (empty($data)) {
                $this->warn("Tidak ada data baru yang perlu disinkronkan.");
                return Command::SUCCESS;
            }

            foreach ($data as $item) {
                try {
                    // Format tanggal jika ada
                    $formattedTanggalSkTugas = isset($item['tanggal_sk_tugas']) && $item['tanggal_sk_tugas']
                        ? Carbon::createFromFormat('d-m-Y', $item['tanggal_sk_tugas'])->format('Y-m-d')
                        : null;

                    $formattedTanggalMulai = isset($item['tanggal_mulai']) && $item['tanggal_mulai']
                        ? Carbon::createFromFormat('d-m-Y', $item['tanggal_mulai'])->format('Y-m-d')
                        : null;

                    $formattedTanggalSelesai = isset($item['tanggal_selesai']) && $item['tanggal_selesai']
                        ? Carbon::createFromFormat('d-m-Y', $item['tanggal_selesai'])->format('Y-m-d')
                        : null;
                    // Sinkronisasi data ke database
                    AktivitasMahasiswa::updateOrCreate(
                        ['id_aktivitas' => $item['id_aktivitas'], 'id_prodi' => $item['id_prodi']],
                        [
                            'asal_data' => $item['asal_data'] ?? '',
                            'nm_asaldata' => $item['nm_asaldata'] ?? '',
                            'program_mbkm' => $item['program_mbkm'] ?? '',
                            'nama_program_mbkm' => $item['nama_program_mbkm'] ?? '',
                            'jenis_anggota' => $item['jenis_anggota'] ?? '',
                            'nama_jenis_anggota' => $item['nama_jenis_anggota'] ?? '',
                            'id_jenis_aktivitas' => $item['id_jenis_aktivitas'] ?? '',
                            'nama_jenis_aktivitas' => $item['nama_jenis_aktivitas'] ?? '',
                            'id_prodi' => $item['id_prodi'] ?? '',
                            'nama_prodi' => $item['nama_prodi'] ?? '',
                            'id_semester' => $item['id_semester'] ?? '',
                            'nama_semester' => $item['nama_semester'] ?? '',
                            'judul' => $item['judul'] ?? '',
                            'keterangan' => $item['keterangan'] ?? '',
                            'lokasi' => $item['lokasi'] ?? '',
                            'sk_tugas' => $item['sk_tugas'] ?? '',
                            'sumber_data' => $item['sumber_data'] ?? '',
                            'tanggal_sk_tugas' => $formattedTanggalSkTugas,
                            'tanggal_mulai' => $formattedTanggalMulai,
                            'tanggal_selesai' => $formattedTanggalSelesai,
                            'untuk_kampus_merdeka' => $item['untuk_kampus_merdeka'] ?? '',
                            'status_sync' => $item['status_sync'] ?? '',
                        ]
                    );  
                    $this->info("Sinkronkan Data ID {$item['id_aktivitas']} berhasil.");
                } catch (\Exception $e) {
                    $this->error("Gagal sinkronkan Data ID {$item['id_aktivitas']}: " . $e->getMessage());
                }
            }
        }
        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
