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
        Schema::create('export_data_mahasiswa_krs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->string('id_periode');
            $table->string('nama_periode');
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->uuid('id_matkul');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->decimal('sks_mata_kuliah');
            $table->integer('nilai_angka')->nullable();
            $table->string('nilai_huruf')->nullable();
            $table->integer('nilai_indeks')->nullable();
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_matkul')->references('id_matkul')->on('list_mata_kuliah');

            $table->index(['id_prodi', 'id_matkul'], 'index_export_data_mahasiswa_krs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_data_mahasiswa_krs');
    }
};
