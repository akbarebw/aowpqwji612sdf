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
        Schema::create('aktivitas_mengajar_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_dosen');
            $table->string('nama_dosen');
            $table->integer('id_periode');
            $table->string('nama_periode');
            $table->string('nama_program_studi');
            $table->string('nama_mata_kuliah');
            $table->uuid('id_kelas');
            $table->string('nama_kelas_kuliah');
            $table->integer('rencana_minggu_pertemuan');
            $table->integer('realisasi_minggu_pertemuan')->nullable();
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_dosen')->references('id_dosen')->on('dosen');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');

            $table->index(['id_dosen', 'id_prodi', 'id_matkul']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas_mengajar_dosen');
    }
};
