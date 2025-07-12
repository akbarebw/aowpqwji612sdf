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
        Schema::create('list_aktivitas_mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('asal_data');
            $table->string('nm_asaldata');
            $table->uuid('id_aktivitas')->unique();
            $table->integer('program_mbkm');
            $table->string('nama_program_mbkm');
            $table->integer('jenis_anggota');
            $table->string('nama_jenis_anggota');
            $table->integer('id_jenis_aktivitas');
            $table->string('nama_jenis_aktivitas');
            $table->string('nama_prodi');
            $table->bigInteger('id_semester');
            $table->string('nama_semester');
            $table->longtext('judul');
            $table->longtext('keterangan')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('sk_tugas')->nullable();
            $table->string('sumber_data')->nullable();
            $table->datetime('tanggal_sk_tugas')->nullable();
            $table->datetime('tanggal_mulai')->nullable();
            $table->datetime('tanggal_selesai')->nullable();
            $table->integer('untuk_kampus_merdeka');
            $table->string('status_sync');
            $table->timestamps();

            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');   
            $table->foreign('id_semester')->references('id_semester')->on('semester');

            $table->index(['id_aktivitas', 'id_prodi', 'id_semester'], 'index_list_aktivitas_mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_aktivitas_mahasiswa');
    }
};
