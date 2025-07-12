<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('periode_perkuliahan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_program_studi');
            $table->bigInteger('id_semester');
            $table->string('nama_semester');
            $table->integer('jumlah_target_mahasiswa_baru')->nullable();
            $table->date('tanggal_awal_perkuliahan');
            $table->date('tanggal_akhir_perkuliahan');
            $table->integer('calon_ikut_seleksi')->nullable();
            $table->integer('calon_lulus_seleksi')->nullable();
            $table->integer('daftar_sbg_mhs')->nullable();
            $table->integer('pst_undur_diri')->nullable();
            $table->integer('jml_mgu_kul')->nullable();
            $table->string('metode_kul')->nullable();
            $table->string('metode_kul_eks')->nullable();
            $table->date('tgl_create');
            $table->date('last_update');
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            // $table->foreign('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreignUuid('id_prodi')->refrences('id_prodi')->on('prodi');
            $table->foreign('id_semester')->references('id_semester')->on('semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_perkuliahan');
    }
};
