<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\RiwayatNilaiMahasiswa;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncRiwayatNilaiMahasiswaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $riwayatNilaiMahaiswa;
    public function __construct($riwayatNilaiMahaiswa)
    {
        $this->riwayatNilaiMahaiswa = $riwayatNilaiMahaiswa;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->riwayatNilaiMahaiswa;

        RiwayatNilaiMahasiswa::updateOrCreate(
        [
            'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
            'id_prodi' => $item['id_prodi'],
            'id_periode' => $item['id_periode'],
            'id_kelas' => $item['id_kelas'],
            'id_matkul' => $item['id_matkul'],
        ],
        [
            'nama_program_studi' => $item['nama_program_studi'] ?? null,
            'nama_mata_kuliah' => $item['nama_mata_kuliah'] ?? null,
            'nama_kelas_kuliah' => $item['nama_kelas_kuliah'] ?? null,
            'nama_mahasiswa' => $item['nama_mahasiswa'] ?? null,
            'nim' => $item['nim'] ?? null,
            'sks_mata_kuliah' => $item['sks_mata_kuliah'] ?? null,
            'status_sync' => 'berhasil',
            'angkatan' => $item['angkatan'] ?? null,
            'nilai_angka' => $item['nilai_angka'] ?? null,
            'nilai_huruf' => $item['nilai_huruf'] ?? null,
            'nilai_indeks' => $item['nilai_indeks'] ?? null,
        ]
    );

    }
}
