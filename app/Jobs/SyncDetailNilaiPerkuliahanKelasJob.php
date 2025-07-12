<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\DetailNilaiPerkuliahan;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\DetailNilaiPerkuliahanKelas;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncDetailNilaiPerkuliahanKelasJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $detailNilaiPerkuliahanKelas;

    /**
     * Create a new job instance.
     */
    public function __construct($detailNilaiPerkuliahanKelas)
    {
        $this->detailNilaiPerkuliahanKelas = $detailNilaiPerkuliahanKelas;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->detailNilaiPerkuliahanKelas;

        DetailNilaiPerkuliahan::updateOrCreate(
            [
                "id_prodi" => $item['id_prodi'],
                "id_semester" => $item['id_semester'],
                "id_matkul" => $item['id_matkul'],
                "id_kelas_kuliah" => $item['id_kelas_kuliah'],
                "id_registrasi_mahasiswa" => $item['id_registrasi_mahasiswa'],
                "id_mahasiswa" => $item['id_mahasiswa'],
            ],
            [
                "nama_program_studi" =>$item['nama_program_studi'],
                "nama_semester" => $item['nama_semester'],
                "kode_mata_kuliah" => $item['kode_mata_kuliah'],
                "nama_mata_kuliah" =>$item['nama_mata_kuliah'],
                "sks_mata_kuliah" => $item['sks_mata_kuliah'],
                "nim" => $item['nim'],
                "nama_kelas_kuliah" => $item['nama_kelas_kuliah'],
                "nama_mahasiswa" => $item['nama_mahasiswa'],
                "jurusan" =>$item['jurusan'],
                "angkatan" => $item['angkatan'],
                "nilai_angka" => $item['nilai_angka'],
                "nilai_indeks" => $item['nilai_indeks'],
                "nilai_huruf" => $item['nilai_huruf'],
            ]
        );
    }
}
