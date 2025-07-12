<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\StatusMahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusmahasiswa = StatusMahasiswa::create([
            'id' => Str::uuid(),
            'id_status_mahasiswa' => 'D',
            'nama_status_mahasiswa' => 'Drop-Out/Putus Studi',
        ]);
        $statusmahasiswa = StatusMahasiswa::create([
            'id' => Str::uuid(),
            'id_status_mahasiswa' => 'K',
            'nama_status_mahasiswa' => 'Keluar',
        ]);
        $statusmahasiswa = StatusMahasiswa::create([
            'id' => Str::uuid(),
            'id_status_mahasiswa' => 'L',
            'nama_status_mahasiswa' => 'Lulus',
        ]);

    }
}
