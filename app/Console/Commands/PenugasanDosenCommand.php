<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\PenugasanDosen;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class PenugasanDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:penugasan-dosen-command';

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
        $this->info("Memulai sinkronisasi data Penugasan semua Dosen ...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetListPenugasanDosen', $params);

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
                $tanggalSuratTugas = Carbon::createFromFormat('d-m-Y', $item['tanggal_surat_tugas'])->format('Y-m-d');

                PenugasanDosen::updateOrCreate(
                    ['id_registrasi_dosen' => $item['id_registrasi_dosen']],
                    [
                        'jk' => $item['jk'],
                        'id_dosen' => $item['id_dosen'],
                        'nama_dosen' => $item['nama_dosen'],
                        'nidn' => $item['nidn'],
                        'id_tahun_ajaran' => $item['id_tahun_ajaran'],
                        'nama_tahun_ajaran' => $item['nama_tahun_ajaran'],
                        'id_perguruan_tinggi' => $item['id_perguruan_tinggi'],
                        'nama_perguruan_tinggi' => $item['nama_perguruan_tinggi'],
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'nomor_surat_tugas' => $item['nomor_surat_tugas'],
                        'tanggal_surat_tugas' => $tanggalSuratTugas,
                        'mulai_surat_tugas' => $item['mulai_surat_tugas'],
                        'tgl_create' => $item['tgl_create'],
                        'tgl_ptk_keluar' => $item['tgl_ptk_keluar'],
                        'id_stat_pegawai' => $item['id_stat_pegawai'],
                        'id_jns_keluar' => $item['id_jns_keluar'],
                        'id_ikatan_kerja' => $item['id_ikatan_kerja'],
                        'a_sp_homebase' => $item['a_sp_homebase']
                    ]

                );

                $this->info("Data Penugasan Dosen {$item['id_registrasi_dosen']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data Penugasan Dosen {$item['id_registrasi_dosen']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
