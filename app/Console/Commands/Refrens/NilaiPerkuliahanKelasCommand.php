<?php

namespace App\Console\Commands\Refrens;

use App\Models\Prodi;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\NilaiPerkuliahanKelas;




class NilaiPerkuliahanKelasCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:nilai-perkuliahan-kelas-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Nilai Perkuliahan Kelas dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Nilai Perkuliahan Kelas...");

        $apiRequest = new ApiRequest();

        $params = [
            "filter" => "",
            'order' => '',
            'limit' => '100',
            'offset' => '',
        ];

        $response = $apiRequest->sendRequest('GetListNilaiPerkuliahanKelas', $params);
        // dd($response);

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
                //Format tanggal jika ada
                // $formattedTanggalMulaiKoas = isset($item['tgl_mulai_koas']) && $item['tgl_mulai_koas']
                // ? Carbon::createFromFormat('d-m-Y', $item['tgl_mulai_koas'])->format('Y-m-d')
                // : null;

                // $formattedTanggalSelesaiKoas = isset($item['tgl_selesai_koas']) && $item['tgl_selesai_koas']
                // ? Carbon::createFromFormat('d-m-Y', $item['tgl_selesai_koas'])->format('Y-m-d')
                // : null;
                // dd($formattedTanggalMulaiKoas, $formattedTanggalSelesaiKoas);
                NilaiPerkuliahanKelas::updateOrCreate(
                    
                    [
                        'id_matkul' => $item['id_matkul'] ?? null,
                        'kode_mata_kuliah' => $item['tgl_create'] ?? null,
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'] ?? null,
                        'id_kelas_kuliah' => $item['id_kelas_kuliah'] ?? null,
                        'nama_kelas_kuliah' => $item['nama_kelas_kuliah'] ?? null,
                        'sks_mata_kuliah' => $item['sks_mata_kuliah'] ?? null,
                        'jumlah_mahasiswa_krs' => $item['jumlah_mahasiswa_krs'] ?? null,
                        'jumlah_mahasiswa_dapat_nilai' => $item['jumlah_mahasiswa_dapat_nilai'] ?? null,
                        'sks_tm' => $item['sks_tm'] ?? null,
                        'sks_prak' => $item['sks_prak'] ?? null,
                        'sks_prak_lap' => $item['sks_prak_lap'] ?? null,
                        'sks_sim' => $item['sks_sim'] ?? null,
                        'bahasan_case' => $item['bahasan_case'] ?? null,
                        'a_selenggara_pditt' => $item['a_selenggara_pditt'] ?? null,
                        'a_pengguna_pditt' => $item['a_pengguna_pditt'] ?? null,
                        'kuota_pditt' => $item['kuota_pditt'] ?? null,
                        'tgl_mulai_koas' => $item['tgl_mulai_koas'] ?? null,
                        'tgl_selesai_koas' => $item['tgl_selesai_koas'] ?? null,
                        'id_mou' => $item['id_mou'] ?? null,
                        'id_kls_pditt' => $item['id_kls_pditt'] ?? null,
                        'id_sms' => $item['id_sms'] ?? null,
                        'id_smt' => $item['id_smt'] ?? null,
                        'tgl_create' => $item['tgl_create'] ?? null,
                        'lingkup_kelas' => $item['lingkup_kelas'] ?? null,
                        'mode_kuliah' => $item['mode_kuliah'] ?? null,
                        'nm_smt' => $item['nm_smt'] ?? null,
                        'nama_prodi' => $item['nama_prodi'] ?? null,
                        'status_sync' => $item['status_sync'] ?? null,
                    ]
                );
                $this->info("Data Matkul  {$item['id_matkul']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data Matkul ID {$item['id_matkul']}: " . $e->getMessage());
                break;
            }
        }
        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;

    }
}
