<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\IkatanKerjaSdm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IkatanKerjaSdmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ikatanKerja = IkatanKerjaSdm::create([
            'id' => Str::uuid(),
            'id_ikatan_kerja' => "X",
            'nama_ikatan_kerja' => 'Lainnya',
        ]);
    }
}
