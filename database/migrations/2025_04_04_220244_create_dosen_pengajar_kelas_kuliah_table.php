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
        Schema::create('dosen_pengajar_kelas_kuliah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_aktivitas_mengajar');
            $table->uuid('id_registrasi_dosen');
            $table->bigInteger('nidn')->nullable();
            $table->string('nama_dosen');
            $table->string('nama_kelas_kuliah');
            $table->string('id_substansi')->nullable();
            $table->decimal('sks_substansi_total', 4, 2);
            $table->integer('rencana_minggu_pertemuan');
            $table->integer('realisasi_minggu_pertemuan')->nullable();
            $table->bigInteger('id_jenis_evaluasi');
            $table->string('nama_jenis_evaluasi');
            $table->bigInteger('id_semester');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_dosen')->references('id_dosen')->on('dosen');
            $table->foreignUuid('id_kelas_kuliah')->references('id_kelas_kuliah')->on('kelas_kuliah');
            $table->foreign('id_jenis_evaluasi')->references('id_jenis_evaluasi')->on('jenis_evaluasi');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_semester')->references('id_semester')->on('semester');

            $table->index(['id_dosen', 'id_kelas_kuliah', 'id_jenis_evaluasi', 'id_prodi', 'id_semester'], 'dospen_kelas_index');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_pengajar_kelas_kuliah');
    }
};
