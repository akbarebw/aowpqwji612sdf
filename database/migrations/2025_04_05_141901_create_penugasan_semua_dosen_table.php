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
        Schema::create('penugasan_semua_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_dosen');
            $table->uuid('id_dosen');
            $table->string('nama_dosen');
            $table->string('nidn')->nullable();
            $table->string('jenis_kelamin');
            $table->integer('id_tahun_ajaran');
            $table->string('nama_tahun_ajaran');
            $table->uuid('id_prodi')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('nomor_surat_tugas');
            $table->date('tanggal_surat_tugas');
            $table->string('apakah_homebase');
            $table->timestamps();

            //relasi
            
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen');
            $table->foreign('id_tahun_ajaran')->references('id_tahun_ajaran')->on('tahun_ajaran');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi');

            $table->index(['id_dosen', 'id_tahun_ajaran', 'id_prodi'], 'penugasan_semua_dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan_semua_dosen');
    }
};
