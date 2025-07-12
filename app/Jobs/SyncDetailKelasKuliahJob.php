<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use App\Models\DetailKelasKuliah;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncDetailKelasKuliahJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $detailKelasKuliah;
    /**
     * Create a new job instance.
     */
    public function __construct($detailKelasKuliah)
    {
        $this->detailKelasKuliah = $detailKelasKuliah;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->detailKelasKuliah;

        $formattedTanggalMulaiEfektif = isset($item['tanggal_mulai_efektif']) && $item['tanggal_mulai_efektif']
        ? Carbon::createFromFormat('d-m-Y', $item['tanggal_mulai_efektif'])->format('Y-m-d')
        : null;

        $formattedTanggalAkhirEfektif = isset($item['tanggal_akhir_efektif']) && $item['tanggal_akhir_efektif']
            ? Carbon::createFromFormat('d-m-Y', $item['tanggal_akhir_efektif'])->format('Y-m-d')
            : null;

        $formattedTanggalTutupDaftar = isset($item['tanggal_tutup_daftar']) && $item['tanggal_tutup_daftar']
            ? Carbon::createFromFormat('d-m-Y', $item['tanggal_tutup_daftar'])->format('Y-m-d')
            : null;

        
        DetailKelasKuliah::updateOrCreate(
            [
                'id_kelas_kuliah' => $item['id_kelas_kuliah'],
                'id_prodi' => $item['id_prodi'],
                'id_semester' => $item['id_semester'],
                'id_matkul' => $item['id_matkul'],
            ],
            [
                'nama_program_studi' => $item['nama_program_studi'],
                'nama_semester' => $item['nama_semester'],
                'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                'nama_kelas_kuliah' => $item['nama_kelas_kuliah'],
                'bahasan' => $item['bahasan'],
                'tanggal_mulai_efektif' => $formattedTanggalMulaiEfektif,
                'tanggal_akhir_efektif' => $formattedTanggalAkhirEfektif,
                'kapasitas' => $item['kapasitas'],
                'tanggal_tutup_daftar' => $formattedTanggalTutupDaftar,
                'prodi_penyelenggara' => $item['prodi_penyelenggara'],
                'perguruan_tinggi_penyelenggara' => $item['perguruan_tinggi_penyelenggara'],

            ]
        );
    }
}
