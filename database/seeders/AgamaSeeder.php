<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agama = Agama::create([
            'id' => Str::uuid(),
            'id_agama' => 98,
            'nama_agama' => 'Lainnya',
        ]);

        
    }
}
