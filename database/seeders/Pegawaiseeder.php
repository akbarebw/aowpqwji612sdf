<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Pegawaiseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pegawai = Pegawai::create([
            'id' => Str::uuid(),
            'name' => 'Nama',
        ]);


    }
}
