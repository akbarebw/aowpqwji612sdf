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
        Schema::create('krs_mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_mahasiswa');
            $table->integer('id_periode');
            $table->string('nama_program_studi');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->uuid('id_kelas');
            $table->string('nama_kelas_kuliah');
            $table->decimal('sks_mata_kuliah', 5, 2);
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->integer('angkatan');
            $table->timestamps();

            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');

            $table->index(['id_prodi', 'id_matkul']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs_mahasiswa');
    }
};
