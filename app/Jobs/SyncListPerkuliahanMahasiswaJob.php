<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use App\Models\ListPerkuliahanMahasiswa;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncListPerkuliahanMahasiswaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $listPerkuliahanMahasiswa;

    public function __construct($listPerkuliahanMahasiswa)
    {
        $this->listPerkuliahanMahasiswa = $listPerkuliahanMahasiswa;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->listPerkuliahanMahasiswa;

        ListPerkuliahanMahasiswa::updateOrCreate(
            [
                'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                'nim' => $item['nim'],
                'id_prodi' => $item['id_prodi'],
                'id_periode_masuk' => $item['id_periode_masuk'],
                'id_semester' => $item['id_semester'],
                'id_status_mahasiswa' => $item['id_status_mahasiswa'],
            ],
            [
                'nama_mahasiswa' => $item['nama_mahasiswa'],
                'nama_program_studi' => $item['nama_program_studi'],
                'angkatan' => $item['angkatan'],
                'nama_semester' => $item['nama_semester'],
                'nama_status_mahasiswa' => $item['nama_status_mahasiswa'],
                'ips' => $item['ips'],
                'ipk' => $item['ipk'],
                'sks_semester' => $item['sks_semester'],
                'sks_total' => $item['sks_total'],
                'biaya_kuliah_smt' => $item['biaya_kuliah_smt'],
                'id_pembiayaan' => $item['id_pembiayaan'],
                'status_sync' => $item['status_sync']

            ]
        );
    }
}
