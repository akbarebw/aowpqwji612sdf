<?php

namespace App\Jobs;

use App\Models\KrsMahasiswa;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncKrsMahasiswaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $krsMahasiswa;

    /**
     * Create a new job instance.
     */
    public function __construct($krsMahasiswa)
    {
        $this->krsMahasiswa = $krsMahasiswa;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->krsMahasiswa;
        
        KrsMahasiswa::updateOrCreate(
            [
                'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                'id_periode'           => $item['id_periode'],
                'id_prodi'             => $item['id_prodi'],
                'id_matkul'            => $item['id_matkul'],
                'id_kelas'             => $item['id_kelas'],
            ],
            [
                'nama_program_studi'   => $item['nama_program_studi'],
                'kode_mata_kuliah'     => $item['kode_mata_kuliah'],
                'nama_mata_kuliah'     => $item['nama_mata_kuliah'],
                'nama_kelas_kuliah'    => $item['nama_kelas_kuliah'],
                'sks_mata_kuliah'      => $item['sks_mata_kuliah'],
                'nim'                  => $item['nim'],
                'nama_mahasiswa'       => $item['nama_mahasiswa'],
                'angkatan'             => $item['angkatan'],
            ]
        );
    }
}
