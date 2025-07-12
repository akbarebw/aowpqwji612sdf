<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\LembagaPengangkat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LembagaPengangkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LembagaPengangkat::create([
            'id' => Str::uuid(),
            'id_lembaga_angkat' => "1",
            'nama_lembaga_angkat' => 'Kementerian Riset, Teknologi dan Pendidikan Tinggi',
        ]);
    }
}
