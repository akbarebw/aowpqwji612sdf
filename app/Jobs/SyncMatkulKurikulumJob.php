<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\MatkulKurikulum;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncMatkulKurikulumJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public $matkulKurikulum;

    public function __construct($matkulKurikulum)
    {
        $this->matkulKurikulum = $matkulKurikulum;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $item = $this->matkulKurikulum;

        MatkulKurikulum::updateOrCreate(
            [
                'id_matkul' => $item['id_matkul'],
                'id_semester' => $item['id_semester'],
                'id_kurikulum' => $item['id_kurikulum'],
            ],
            [
                'tgl_create' => $item['tgl_create'],
                'nama_kurikulum' => $item['nama_kurikulum'],
                'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                'id_prodi' => $item['id_prodi'],
                'nama_program_studi' => $item['nama_program_studi'],
                'semester' => $item['semester'],
                'semester_mulai_berlaku' => $item['semester_mulai_berlaku'],
                'sks_mata_kuliah' => $item['sks_mata_kuliah'],
                'sks_tatap_muka' => $item['sks_tatap_muka'],
                'sks_praktek' => $item['sks_praktek'],
                'sks_praktek_lapangan' => $item['sks_praktek_lapangan'],
                'sks_simulasi' => $item['sks_simulasi'],
                'apakah_wajib' => $item['apakah_wajib'],
                'status_sync' => 'synced'
            ]
        );
    }
}
