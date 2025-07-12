<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\ExportDataKelasPerkuliahan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncExportDataKelasPerkuliahanJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $exportDataKelasPerkuliahan;

    /**
     * Create a new job instance.
     */
    public function __construct($exportDataKelasPerkuliahan)
    {
        $this->exportDataKelasPerkuliahan = $exportDataKelasPerkuliahan;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->exportDataKelasPerkuliahan;

        ExportDataKelasPerkuliahan::updateOrCreate(
                [
                    'id_prodi' => $item['id_prodi'],
                    'id_periode' => $item['id_periode'],
                    'id_matkul' => $item['id_matkul'],
                    'id_kelas_kuliah' => $item['id_kelas_kuliah'],
                ],
                [  
                    'nama_program_studi' => $item['nama_program_studi'],
                    'nama_periode' => $item['nama_periode'],
                    'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                    'nama_mata_kuliah' => $item['nama_mata_kulias'],
                    'nama_kelas_kuliah' => $item['nama_kelas_kuliah'],
                    'sks_mata_kuliah' => $item['sks_mata_kuliah'],
                    'jumlah_krs' => $item['jumlah_krs'],
                    'jumlah_dosen' => $item['jumlah_dosen'],
                    'status_sync' => $item['status_sync'],
                ]
        );
    }
}
