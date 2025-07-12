<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\ExportDataMahasiswaKrs;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncExportDataMahasiswaKrsCommandJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $exportDataMahasiswaKrs;

    /**
     * Create a new job instance.
     */
    public function __construct($exportDataMahasiswaKrs)
    {
        $this->exportDataMahasiswaKrs=$exportDataMahasiswaKrs;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->exportDataMahasiswaKrs;

        ExportDataMahasiswaKrs::updateOrCreate(
            [
                "id_prodi" => $item["id_prodi"],
                'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                "id_periode" => $item["id_periode"],
                "id_matkul" => $item["id_matkul"],
            ],
            [
                "nama_program_studi" => $item["nama_program_studi"],
                "nama_periode" => $item["nama_periode"],
                "nim" => $item["nim"],
                "nama_mahasiswa" => $item["nama_mahasiswa"],
                "kode_mata_kuliah" => $item["kode_mata_kuliah"],
                "nama_mata_kuliah" => $item["nama_mata_kuliah"],
                "sks_mata_kuliah" => $item["sks_mata_kuliah"],
                "nilai_angka" => $item["nilai_angka"],
                "nilai_huruf" => $item["nilai_huruf"],
                "nilai_indeks" => $item["nilai_indeks"],
                "status_sync" => $item["status_sync"],
            ],
        );
    }
}
