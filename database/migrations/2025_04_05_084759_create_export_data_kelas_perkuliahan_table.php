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
        Schema::create('export_data_kelas_perkuliahan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->string('id_periode');
            $table->string('nama_periode');
            // $table->uuid('id_matkul');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            // $table->uuid('id_kelas_kuliah');
            $table->string('nama_kelas_kuliah');
            $table->decimal('sks_mata_kuliah');
            $table->integer('jumlah_krs');
            $table->integer('jumlah_dosen');
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
            $table->foreignUuid('id_kelas_kuliah')->references('id_kelas_kuliah')->on('kelas_kuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_data_kelas_perkuliahan');
    }
};
