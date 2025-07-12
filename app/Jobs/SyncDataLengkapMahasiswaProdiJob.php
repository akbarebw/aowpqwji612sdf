<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\DataLengkapMahasiswaProdi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncDataLengkapMahasiswaProdiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dataLengkapMahasiswa;
    /**
     * Create a new job instance.
     */
    public function __construct($dataLengkapMahasiswa)
    {
        $this->dataLengkapMahasiswa = $dataLengkapMahasiswa;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->dataLengkapMahasiswa;

        DataLengkapMahasiswaProdi::updateOrCreate(
            [
                'id_mahasiswa' => $item['id_mahasiswa'],
                'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
            ],
            [
                'id_prodi' => $item['id_prodi'],
                'tanggal_lahir' => $item['tanggal_lahir'],
                'nama_program_studi' => $item['nama_program_studi'],
                'nama_status_mahasiswa' => $item['nama_status_mahasiswa'],
                'id_status_mahasiswa' => $item['id_status_mahasiswa'],
                'nim' => $item['nim'],
                'id_periode_masuk' => $item['id_periode_masuk'],
                'nama_periode_masuk' => $item['nama_periode_masuk'],
                'jalur_masuk' => $item['jalur_masuk'],
                'nama_jalur_masuk' => $item['nama_jalur_masuk'],
                'tempat_lahir' => $item['tempat_lahir'],
                'id_agama' => $item['id_agama'],
                'nama_agama' => $item['nama_agama'],
                'nama_mahasiswa' => $item['nama_mahasiswa'],
                'nik' => $item['nik'],
                'nisn' => $item['nisn'],
                'npwp' => $item['npwp'],
                'id_negara' => $item['id_negara'],
                'kewarganegaraan' => $item['kewarganegaraan'],
                'jalan' => $item['jalan'],
                'dusun' => $item['dusun'],
                'rt' => $item['rt'],
                'rw' => $item['rw'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'kelurahan' => $item['kelurahan'],
                'kode_pos' => $item['kode_pos'],
                'id_wilayah' => $item['id_wilayah'],
                'nama_wilayah' => $item['nama_wilayah'],
                'id_jenis_tinggal' => $item['id_jenis_tinggal'],
                'nama_jenis_tinggal' => $item['nama_jenis_tinggal'],
                'id_alat_transportasi' => $item['id_alat_transportasi'],
                'nama_alat_transportasi' => $item['nama_alat_transportasi'],
                'telepon' => $item['telepon'],
                'handphone' => $item['handphone'],
                'email' => $item['email'],
                'status_sync' => $item['status_sync'],
            ]
        );
    }
}
