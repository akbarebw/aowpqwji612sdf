<?php

namespace Database\Seeders;

use App\Models\JenisKeluar;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = JenisKeluar::create([
            "id"=> Str::uuid(),
            "id_jenis_keluar" => "Z",
            "jenis_keluar" => "Lainnya",
            "apa_mahasiswa" => "1",

        ]);
    }
}
