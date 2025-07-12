<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\AlatTransportasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlatTranfortasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alat_transportasi = AlatTransportasi::create([
            "id"=> Str::uuid(),
            "id_alat_transportasi"=> "2",
            "nama_alat_transportasi"=> "Naik buraq",
        ]);
    }
}
