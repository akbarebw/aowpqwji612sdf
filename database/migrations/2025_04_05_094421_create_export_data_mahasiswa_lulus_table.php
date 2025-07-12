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
        Schema::create('export_data_mahasiswa_lulus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->string('jenis_kelamin');
            // $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->string('id_periode');
            $table->string('nama_periode_masuk');
            $table->string('id_jenis_keluar');
            $table->string('nama_jenis_keluar');
            $table->string('nomor_ijazah')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_jenis_keluar')->references('id_jenis_keluar')->on('jenis_keluar');

            $table->index(['id_prodi', 'id_jenis_keluar'], 'index_export_data_mhs_lulus');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_data_mahasiswa_lulus');
    }
};
