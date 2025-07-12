<?php

namespace App\Jobs;

use App\Models\Mahasiswa;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncMahasiswaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mahasiswaData;

    /**
     * Create a new job instance.
     */
    public function __construct(array $mahasiswaData)
    {
        $this->mahasiswaData = $mahasiswaData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->mahasiswaData;

        Mahasiswa::updateOrCreate(
            [
                'id_mahasiswa' => $item['id_mahasiswa'],
                'id_perguruan_tinggi' => $item['id_perguruan_tinggi'],
                'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                'id_prodi' => $item['id_prodi'],
                'id_sms' => $item['id_sms'],
            ],
            [
                'nama_mahasiswa' => $item['nama_mahasiswa'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'tanggal_lahir' => Carbon::parse($item['tanggal_lahir'])->format('Y-m-d H:i:s'),
                'nipd' => $item['nipd'],
                'ipk' => $item['ipk'],
                'total_sks' => $item['total_sks'],
                'id_sms' => $item['id_sms'],
                'id_agama' => $item['id_agama'],
                'nama_agama' => $item['nama_agama'],
                'nama_program_studi' => $item['nama_program_studi'],
                'id_status_mahasiswa' => $item['id_status_mahasiswa'],
                'nama_status_mahasiswa' => $item['nama_status_mahasiswa'],
                'nim' => $item['nim'],
                'id_periode' => $item['id_periode'],
                'nama_periode_masuk' => $item['nama_periode_masuk'],
                'id_periode_keluar' => $item['id_periode_keluar'],
                'tanggal_keluar' => Carbon::parse($item['tanggal_keluar'])->format('Y-m-d H:i:s'),
                'last_update' => Carbon::parse($item['last_update'])->format('Y-m-d H:i:s'),
                'tgl_create' => Carbon::parse($item['tgl_create'])->format('Y-m-d H:i:s'),
                'status_sync' => $item['status_sync'],
            ]
        );
    }
}
