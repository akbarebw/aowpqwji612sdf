<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\ListNilaiPerkuliahanKelas;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncListNilaiPerkuliahanKelasJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $listNilai;
    /**
     * Create a new job instance.
     */
    public function __construct($listNilai)
    {
        $this->listNilai = $listNilai;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->listNilai;

        ListNilaiPerkuliahanKelas::updateOrCreate(
            [
                'id_matkul' => $item['id_matkul'] ?? null,
                'id_kelas_kuliah' => $item['id_kelas_kuliah'] ?? null,
            ],
            [
                'kode_mata_kuliah' => $item['tgl_create'] ?? null,
                'nama_mata_kuliah' => $item['nama_mata_kuliah'] ?? null,
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
    }
}
