<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\ListAktivitasMahasiswa;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncListAktivitasMahasiswaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $listAktivitas;
    /**
     * Create a new job instance.
     */
    public function __construct($listAktivitas)
    {
        $this->listAktivitas = $listAktivitas;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->listAktivitas;

        ListAktivitasMahasiswa::updateOrCreate(
            [
                'id_aktivitas' => $item['id_aktivitas'],
                'id_semester' => $item['id_semester'],
                'id_jenis_aktivitas' => $item['id_jenis_aktivitas'],
                'id_prodi' => $item['id_prodi'],
            ],
            [
                'asal_data' => $item['asal_data'],
                'nm_asaldata' => $item['nm_asaldata'],
                'program_mbkm' => $item['program_mbkm'],
                'nama_program_mbkm' => $item['nama_program_mbkm'],
                'jenis_anggota' => $item['jenis_anggota'],
                'nama_jenis_anggota' => $item['nama_jenis_anggota'],
                'nama_jenis_aktivitas' => $item['nama_jenis_aktivitas'],
                'nama_prodi' => $item['nama_prodi'],
                'nama_semester' => $item['nama_semester'],
                'judul' => $item['judul'],
                'keterangan' => $item['keterangan'],
                'lokasi' => $item['lokasi'],
                'sk_tugas' => $item['sk_tugas'],
                'sumber_data' => $item['sumber_data'],
                'tanggal_sk_tugas' => $item['tanggal_sk_tugas'],
                'tanggal_mulai' => $item['tanggal_mulai'],
                'tanggal_selesai' => $item['tanggal_selesai'],
                'untuk_kampus_merdeka' => $item['untuk_kampus_merdeka'],
                'status_sync' => $item['status_sync'],
            ]
        );
    }
}
