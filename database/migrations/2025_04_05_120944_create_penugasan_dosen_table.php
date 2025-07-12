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
        Schema::create('penugasan_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_dosen');
            $table->string('jk');
            // $table->uuid('id_dosen');
            $table->string('nama_dosen');
            $table->string('nidn')->nullable();
            $table->integer('id_tahun_ajaran');
            $table->string('nama_tahun_ajaran');
            // $table->uuid('id_perguruan_tinggi');
            $table->string('nama_perguruan_tinggi');
            // $table->uuid('id_prodi');
            $table->string('nama_program_studi')->nullable();
            $table->string('nomor_surat_tugas');
            $table->date('tanggal_surat_tugas');
            $table->date('mulai_surat_tugas');
            $table->date('tgl_create');
            $table->date('tgl_ptk_keluar')->nullable();
            $table->bigInteger('id_stat_pegawai');
            $table->string('id_jns_keluar')->nullable();
            $table->string('id_ikatan_kerja');
            $table->integer('a_sp_homebase');
            $table->timestamps();

            //relasi
            // $table->foreign('id_registrasi_dosen')->references('id_registrasi_dosen')->on('registrasi_dosen');
            $table->foreignUuid('id_dosen')->references('id_dosen')->on('dosen');
            $table->foreign('id_tahun_ajaran')->references('id_tahun_ajaran')->on('tahun_ajaran');
            // $table->foreignUuid('id_perguruan_tinggi')->references('id_perguruan_tinggi')->on('perguruan_tinggi');
            $table->foreignUuid('id_prodi')->nullable()->references('id_prodi')->on('prodi');
            $table->foreign('id_jns_keluar')->references('id_jenis_keluar')->on('jenis_keluar');
            $table->foreign('id_ikatan_kerja')->references('id_ikatan_kerja')->on('ikatan_kerja_sdm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan_dosen');
    }
};
