<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2002",
            'nama_tahun_ajaran' => '2002/2003',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);

        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2003",
            'nama_tahun_ajaran' => '2003/2004',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);

        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2004",
            'nama_tahun_ajaran' => '2004/2005',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);

        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2005",
            'nama_tahun_ajaran' => '2005/2006',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);

        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2006",
            'nama_tahun_ajaran' => '2006/2007',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);

        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2007",
            'nama_tahun_ajaran' => '2007/2008',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);

        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2008",
            'nama_tahun_ajaran' => '2008/2009',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);

        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2009",
            'nama_tahun_ajaran' => '2009/2010',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);

        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2010",
            'nama_tahun_ajaran' => '2010/2011',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);

        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2011",
            'nama_tahun_ajaran' => '2011/2012',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);

        $tahun_ajaran = TahunAjaran::create([
            'id' => Str::uuid(),
            'id_tahun_ajaran' => "2012",
            'nama_tahun_ajaran' => '2012/2013',
            'a_periode_aktif' => '0',
            'tanggal_mulai' => null,
            'tanggal_selesai' => null,
        ]);


    }
}
