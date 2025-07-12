<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\StatusKeaktifanPegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusKeaktifanPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = StatusKeaktifanPegawai::create([
            'id' => Str::uuid(),
            'id_status_aktif' => 22,
            'nama_status_aktif' => 'lainnya',
        ]);
    }
}
