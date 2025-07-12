<?php

namespace App\Jobs;

use App\Models\KelasKuliah;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncKelasKuliahJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $kelasKuliah;

    /**
     * Create a new job instance.
     */
    public function __construct($kelasKuliah)
    {
        $this->kelasKuliah = $kelasKuliah;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->kelasKuliah;

        KelasKuliah::updateOrCreate(
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
                'sks' => $item['sks'],
                'id_dosen' => $item['id_dosen'] ?? '',
                'nama_dosen' => $item['nama_dosen'] ?? '',
                'jumlah_mahasiswa' => $item['jumlah_mahasiswa'],
                'apa_untuk_pditt' => $item['apa_untuk_pditt'],

            ]
        );
    }
}
