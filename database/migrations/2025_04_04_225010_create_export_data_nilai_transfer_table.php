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
        Schema::create('export_data_nilai_transfer', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('periode');
            $table->uuid('id_registrasi_mahasiswa');
            $table->uuid('id_mahasiswa');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->string('program_studi');
            $table->integer('angkatan');
            $table->foreignUuid('id_transfer')->references('id_transfer')->on('nilai_transfer_pendidikan_mahasiswa');
            $table->string('kode_matkul_asal');
            $table->string('nama_mata_kuliah_asal');
            $table->integer('sks_mata_kuliah_asal');
            $table->string('nilai_huruf_asal');
            $table->string('kode_matkul_baru');
            $table->string('nama_mata_kuliah_baru');
            $table->integer('sks_mata_kuliah_diakui');
            $table->string('nilai_huruf_diakui');
            $table->decimal('nilai_angka_diakui', 3, 2);
            $table->string('status_sync');
            $table->timestamps();
            
            $table->index(['id_prodi', 'id_transfer'], 'index_export_nilai_tf');
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_data_nilai_transfer');
    }
};
