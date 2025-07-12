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
        Schema::create('riwayat_nilai_mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_mahasiswa');
            // $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->string('id_periode');
            // $table->uuid('id_matkul');
            $table->string('nama_mata_kuliah');
            $table->uuid('id_kelas');
            $table->string('nama_kelas_kuliah');
            $table->string('sks_mata_kuliah');
            $table->integer('nilai_angka')->nullable();
            $table->string('nilai_huruf')->nullable();
            $table->string('nilai_indeks')->nullable();
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->string('angkatan');
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');


            $table->index(['id_prodi','id_matkul']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_nilai_mahasiswa');
    }
};
