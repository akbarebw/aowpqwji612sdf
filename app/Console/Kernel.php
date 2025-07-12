<?php

namespace App\Console;

use App\Console\Commands\RunAllCommands;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // RunAllCommands::class,  // Register your custom command here
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
       //token
       $schedule->command('app:token-command')->hourly();
       // refrens
       $schedule->command('app:agama-command')->monthly(); // >>
       $schedule->command("app:bentuk-pendidikan-command")->monthly(); // >>
       $schedule->command('app:ikatan-kerja-sdm-command')->monthly(); // >>
       $schedule->command('app:jabatan-fungsional-command')->monthly(); // >>
       $schedule->command('app:jalur-masuk-command')->monthly(); // >>
       $schedule->command('app:jalur-evaluasi-command')->monthly(); // >>
       $schedule->command('app:jenis-keluar-command')->monthly(); // >>
       $schedule->command('app:jenis-sertifikasi-command')->monthly(); // >>
       $schedule->command('app:jenis-pendaftaran-command')->monthly(); // >>
       $schedule->command('app:jenis-sms-command')->monthly(); // >>
       $schedule->command('app:jenis-tinggal-command')->monthly(); // >>
       $schedule->command('app:jenjang-pendidikan')->monthly(); // >>
       $schedule->command('app:kebutuhan-khusus')->monthly(); // >>
       $schedule->command('app:lembaga-pengangkat')->monthly(); // >>
       $schedule->command('app:negara-command')->monthly(); // >>
       $schedule->command('app:level-wilayah-command')->monthly(); // >>
       $schedule->command('app:wilayah-command')->monthly(); // >>
       $schedule->command('app:tahun-ajar-command')->monthly(); // >>
       $schedule->command('app:status-mahasiswa-command')->monthly(); // >>
       $schedule->command('app:status-kepegawaian-command')->monthly(); // >>
       $schedule->command('app:status-keaktifan-pegawai-command')->monthly(); // >>
       $schedule->command('app:semester-command')->monthly(); // >>
       $schedule->command('app:penghasilan-command')->monthly(); // >>
       $schedule->command('app:pekerjaan-command')->monthly(); // >>
       $schedule->command('app:pangkat-golongan-command')->monthly(); // >>
       $schedule->command('app:priode-command')->monthly(); // >>
       $schedule->command('app:alat-transportasi-command')->monthly(); // >>
       $schedule->command("app:pembiayaan-command")->monthly(); // >>
       $schedule->command('app:jenis-prestasi-command')->monthly(); // >>
       $schedule->command('app:tingkat-prestasi-command')->monthly(); // >>
       $schedule->command('app:kategori-kegiatan-command')->monthly(); // >>
       $schedule->command('app:jenis-evaluasi-command')->monthly(); // >>
       $schedule->command('app:jenis-substansi-command')->monthly(); // >>
       $schedule->command('app:profil-pt-command')->monthly(); // >>
       $schedule->command("app:prodi-command")->monthly(); // >>
       $schedule->command('app:kurikulum-command')->monthly(); // >>

       // Mata Kuliah
       $schedule->command("app:list-mata-kuliah-command")->monthly(); // >>
       $schedule->command("app:mata-kuliah-command")->monthly(); // >>
       $schedule->command("app:detail-mata-kuliah-command")->monthly(); // >>
       $schedule->command("app:matkul-kurikulum-command")->monthly(); // >>

       // Kurikulum
       $schedule->command("app:detail-kurikulum-command")->monthly(); // >>

       // Rencana Pembelajaran
       $schedule->command("app:rencana-pembelajaran-command")->monthly(); // >>

       // Kelas Kuliah & Mahasiswa
       $schedule->command("app:mahasiswa-command")->monthly(); // >>
       $schedule->command("app:list-perkuliahan-mahasiswa-command")->monthly(); // >>
       $schedule->command("app:list-nilai-perkuliahan-mahasiswa-command")->monthly(); // >>
       $schedule->command("app:biodata-mahasiswa-command")->monthly(); // >>
       $schedule->command("app:data-lengkap-mahasiswa-command")->monthly(); // >>
       $schedule->command("app:jenis-aktivitas-command")->monthly(); // >>
       $schedule->command('app:list-aktivitas-mahasiswa-command')->monthly(); // >>
       $schedule->command("app:detail-perkuliahan-mahasiswa-command")->monthly(); // >>

       // Refrens Pengecualian
       $schedule->command('app:data-terhapus-command')->monthly(); // >>

       // Konversi Kampus Merdeka
       $schedule->command("app:konversi-kampus-merdeka-command")->monthly(); // >>

       // KRS
         $schedule->command("app:krs-mahasiswa-command")->monthly(); // >>

       // Rekap
       $schedule->command("app:rekap-khs-mahasiswa-command")->monthly(); // >>
       $schedule->command("app:rekap-krs-mahasiswa-command")->monthly(); // >>
       $schedule->command("app:rekap-jumlah-dosen-command")->monthly(); // >>
       $schedule->command("app:rekap-jumlah-mahasiswa-command")->monthly(); // >>
       $schedule->command("app:rekap-laporan-command")->monthly(); // >>

       // Rencana Evaluasi
       $schedule->command("app:list-rencana-evaluasi-command")->monthly(); // >>

       // dosen & kelas kuliah
       $schedule->command("app:dosen-command")->monthly(); // >>
       $schedule->command("app:dosen-pembimbing-command")->monthly(); // >>
       $schedule->command("app:kelas-kuliah-command")->monthly(); // >>
       $schedule->command('app:peserta-kelas-kuliah-command')->monthly(); // >>
       $schedule->command("app:list-nilai-perkuliahan-kelas-command")->monthly(); // >>
       $schedule->command("app:detail-nilai-perkuliahan-kelas-command")->monthly(); // >>
       $schedule->command("app:detail-kelas-kuliah-command")->monthly(); // >>

       $schedule->command("app:biodata-dosen-command")->monthly(); // >>
       $schedule->command('app:penugasan-dosen-command')->monthly(); // >>
       $schedule->command("app:riwayat-fungsional-dosen-command")->monthly(); // >>
       $schedule->command("app:riwayat-pangkat-dosen-command")->monthly(); // >>
       $schedule->command("app:riwayat-pendidikan-dosen-command")->monthly(); // >>
       $schedule->command("app:riwayat-sertifikasi-dosen-command")->monthly(); // >>
       $schedule->command("app:riwayat-penelitian-dosen-command")->monthly(); // >>
       $schedule->command("app:mahasiswa-bimbingan-dosen-command")->monthly(); // >>
       $schedule->command('app:penugasan-semua-dosen-command')->monthly(); // >>
       $schedule->command("app:aktivitas-mengajar-dosen-command")->monthly(); // >>
       $schedule->command("app:dosen-pengajar-kelas-kuliah-command")->monthly(); // >>

       // Nilai
       $schedule->command("app:perhitungan-s-k-s-command")->monthly();  // >>
       $schedule->command("app:detail-nilai-perkuliahan-command")->monthly(); // >>
       $schedule->command("app:list-skala-nilai-prodi-command")->monthly(); // >>
       $schedule->command("app:nilai-perkuliahan-kelas-command")->monthly(); // >>
       $schedule->command("app:riwayat-nilai-mahasiswa-command")->monthly(); // >>

       // Periode Perkuliahan
       $schedule->command("app:periode-perkuliahan-command")->monthly(); // >>
       $schedule->command("app:detail-periode-perkuliahan-command")->monthly(); // >>

       // Export
       $schedule->command("app:export-data-mahasiswa-command")->monthly(); // >>
       $schedule->command("app:export-data-nilai-transfer-command")->monthly(); // >>
       $schedule->command("app:export-data-penugasan-dosen-command")->monthly(); // >>
       // $schedule->command("app:export-data-penugasan-dosen-prodi-command")->monthly(); // tidak ada >>
       $schedule->command("app:export-data-matkul-prodi-command")->monthly(); // >>
       $schedule->command("app:export-data-aktivitas-kuliah-command")->monthly(); // >>
       $schedule->command("app:export-data-kelas-perkuliahan-command")->monthly();  // >>
       $schedule->command("app:export-data-mahasiswa-krs-command")->monthly();  // >>
       $schedule->command("app:export-data-mahasiswa-lulus-command")->monthly(); // >>

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
