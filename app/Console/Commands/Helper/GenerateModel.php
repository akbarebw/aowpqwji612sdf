<?php

namespace App\Console\Commands\Helper;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class GenerateModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate models for all tables from database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Daftar tabel dan nama model-nya (bisa kamu sesuaikan nama model sesuai gaya penamaanmu)
        $tables = [
            'jenis_pendaftaran',
            'jenis_sms',
            'jenjang_pendidikan',
            'kebutuhan_khusus',
            'lembaga_pengangkat',
            'level_wilayah',
            'tahun_ajaran',
            'status_mahasiswa',
            'status_kepegawaian',
            'status_keaktifan_pegawai',
            'alat_transportasi',
            'pembiayaan',
            'jenis_prestasi',
            'tingkat_prestasi',
            'kategori_kegiatan',
            'jenis_evaluasi',
            'jenis_substansi',
            'prodi',
            'list_mata_kuliah',
            'semester',
            'negara',
            'wilayah',
            'profilpt',
            'kurikulum',
        ];

        foreach ($tables as $table) {
            $model = Str::studly(Str::singular($table));

            $this->info("Generating model for: $model from table: $table");
            \Artisan::call('infyom:model', [
                'model' => $model,
                '--fromTable' => true,
                '--table' => $table,
            ]);
            $this->line(\Artisan::output());
        }

        $this->info('✅ Semua model berhasil digenerate.');
    }
}
