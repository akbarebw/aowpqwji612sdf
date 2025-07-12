<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use App\Models\RekapKhsMahasiswa;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncRekapKhsMahasiswaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $rekapKhsMahasiswa;

    /**
     * Create a new job instance.
     */
    public function __construct($rekapKhsMahasiswa)
    {
        $this->rekapKhsMahasiswa = $rekapKhsMahasiswa;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->rekapKhsMahasiswa;
            RekapKhsMahasiswa::updateOrCreate(
                [
                    'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                    'id_prodi' => $item['id_prodi'],
                    'nim' => $item['nim'],
                    'id_matkul' => $item['id_matkul'],
                    'id_periode' => $item['id_periode'],
                ],
                [
                    'nama_program_studi' => $item['nama_program_studi'],
                    'nama_mahasiswa' => $item['nama_mahasiswa'],
                    'angkatan' => Carbon::parse($item['angkatan'])->year,
                    'nama_periode' => $item['nama_periode'],
                    'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                    'sks_mata_kuliah' => $item['sks_mata_kuliah'],
                    'nilai_angka' => $item['nilai_angka'],
                    'nilai_huruf' => $item['nilai_huruf'],
                    'nilai_indeks' => $item['nilai_indeks'],
                    'sks_x_indeks' => $item['sks_x_indeks'],
                ]
            );

    }
}
