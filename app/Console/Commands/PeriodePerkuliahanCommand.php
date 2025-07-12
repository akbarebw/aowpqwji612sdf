<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\PeriodePerkuliahan;

class PeriodePerkuliahanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:periode-perkuliahan-command';

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
        $this->info("Memulai sinkronisasi data Periode Perkuliahan...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetListPeriodePerkuliahan', $params);

        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
            return Command::FAILURE;
        }

        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data untuk disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {
            try {
                PeriodePerkuliahan::updateOrCreate(
                    [
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'id_semester' => $item['id_semester'],
                        'nama_semester' => $item['nama_semester'],
                        'jumlah_target_mahasiswa_baru' => $item['jumlah_target_mahasiswa_baru'],
                        'tanggal_awal_perkuliahan' => $item['tanggal_awal_perkuliahan'],
                        'tanggal_akhir_perkuliahan' => $item['tanggal_akhir_perkuliahan'],
                        'calon_ikut_seleksi' => $item['calon_ikut_seleksi'],
                        'calon_lulus_seleksi' => $item['calon_lulus_seleksi'],
                        'daftar_sbg_mhs' => $item['daftar_sbg_mhs'],
                        'pst_undur_diri' => $item['pst_undur_diri'],
                        'jml_mgu_kul' => $item['jml_mgu_kul'],
                        'metode_kul' => $item['metode_kul'],
                        'metode_kul_eks' => $item['metode_kul_eks'],
                        'tgl_create' => $item['tgl_create'],
                        'last_update' => $item['last_update'],
                        'status_sync' => $item['status_sync'],
                    ]
                );

                $this->info("Data periode perkuliahan {$item['id_prodi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk {$item['id_prodi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
