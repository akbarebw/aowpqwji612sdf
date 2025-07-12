<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class RunAllCommands extends Command
{
    protected $signature = 'app:run-all-commands';

    protected $description = 'Run all custom commands in the application';

    public function handle()
    {
        $commands = [

            // 'app:agama-command',
            // 'app:bentuk-pendidikan-command',
            // 'app:ikatan-kerja-sdm-command',
            // 'app:jabatan-fungsional-command',
            // 'app:jalur-masuk-command',
            // 'app:jalur-evaluasi-command',
            // 'app:jenis-keluar-command',
            // 'app:jenis-sertifikasi-command',
            // 'app:jenis-pendaftaran-command',
            // 'app:jenis-sms-command',
            // 'app:jenis-tinggal',
            // 'app:jenjang-pendidikan',
            // 'app:kebutuhan-khusus',
            // 'app:lembaga-pengangkat',
            // 'app:negara-command',
            // 'app:level-wilayah-command',
            // 'app:wilayah-command',
            // 'app:all-profil-pt-command',
            // 'app:profil-pt-command',
            // 'app:tahun-ajar-command',
            // 'app:status-mahasiswa-command',
            // 'app:status-kepegawaian-command',
            // 'app:status-keaktifan-pegawai-command',
            // 'app:semester-command',
            // 'app:penghasilan-command',
            // 'app:pekerjaan-command',
            // 'app:pangkat-golongan-command',
            // 'app:alat-transportasi-command',
            // 'app:pembiayaan-command',
            // 'app:jenis-prestasi-command',
            // 'app:tingkat-prestasi-command',
            // 'app:kategori-kegiatan-command',
            // 'app:jenis-evaluasi-command',
            // 'app:jenis-substansi-command',
            // 'app:prodi-command',
            // 'app:priode-command',
            // 'app:kurikulum-command',
            // 'app:list-mata-kuliah-command',
            // 'app:mata-kuliah-command',
            // 'app:konversi-kampus-merdeka-command',
            // 'app:detail-mata-kuliah-command',
            // 'app:matkul-kurikulum-command',
            // 'app:detail-kurikulum-command',
            // 'app:rencana-pembelajaran-command',
            // 'app:mahasiswa-command',
            // 'app:list-perkuliahan-mahasiswa-command',
            // // 'app:list-nilai-perkuliahan-mahasiswa-command',
            // 'app:biodata-mahasiswa-command',
            // 'app:data-lengkap-mahasiswa-prodi-command',
            // 'app:jenis-aktivitas-command',
            // 'app:list-aktivitas-mahasiswa-command',
            // 'app:detail-perkuliahan-mahasiswa-command',
            // 'app:data-terhapus-command',
            // 'app:krs-mahasiswa-command',
            // 'app:rekap-khs-mahasiswa-command',
            // 'app:rekap-krs-mahasiswa-command',
            // 'app:rekap-jumlah-dosen-command',
            // 'app:list-rencana-evaluasi-command',
            // 'app:dosen-command',
            // 'app:dosen-pembimbing-command',
            // 'app:kelas-kuliah-command',
            // 'app:peserta-kelas-kuliah-command',
            // 'app:list-nilai-perkuliahan-kelas-command',
            'app:detail-kelas-kuliah-command',
            'app:biodata-dosen-command',
            'app:penugasan-dosen-command',
            'app:riwayat-fungsional-dosen-command',
            'app:riwayat-pangkat-dosen-command',
            'app:riwayat-pendidikan-dosen-command',
            'app:riwayat-sertifikasi-dosen-command',
            'app:riwayat-penelitian-dosen-command',
            'app:mahasiswa-bimbingan-dosen-command',
            'app:penugasan-semua-dosen-command',
            'app:aktivitas-mengajar-dosen-command',
            'app:dosen-pengajar-kelas-kuliah-command',
            'app:perhitungan-s-k-s-command',
            'app:detail-nilai-perkuliahan-kelas-command',
            'app:list-skala-nilai-prodi-command',
            'app:nilai-perkuliahan-kelas-command',
            'app:riwayat-nilai-mahasiswa-command',
            'app:periode-perkuliahan-command',
            'app:nilai-transfer-pendidikan-mahasiswa-command',
            'app:detail-periode-perkuliahan-command',
            'app:export-data-mahasiswa-command',
            'app:export-data-nilai-transfer-command',
            'app:export-data-penugasan-dosen-command',
            // 'app:export-data-penugasan-dosen-prodi-command', // tidak ada
            'app:export-data-matkul-prodi-command',
            'app:export-data-aktivitas-kuliah-command',
            'app:export-data-kelas-perkuliahan-command',
            'app:export-data-mahasiswa-krs-command',
            'app:export-data-mahasiswa-lulus-command', //
        ];

        foreach ($commands as $command) {
            $this->info("Running: $command");

            try {
                $exitCode = Artisan::call($command, ['--no-interaction' => true]);
                $output = Artisan::output();
                $this->line($output);


                if ($exitCode !== 0) {
                    $this->error("Command $command failed with exit code: $exitCode");
                    break;
                }

                $this->info("Command $command finished.");
            } catch (\Throwable $e) {

                $this->error("Command $command threw an exception: " . $e->getMessage());
                break;
            }
        }
    }
}
