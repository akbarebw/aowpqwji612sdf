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
        Schema::create('mahasiswa_bimbingan_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid('id_aktivitas');
            $table->longText('judul');
            $table->uuid('id_bimbing_mahasiswa');
            $table->integer('id_kategori_kegiatan');
            $table->longText('nama_kategori_kegiatan');
            // $table->uuid('id_dosen');
            $table->string('nidn');
            $table->string('nama_dosen');
            $table->integer('pembimbing_ke');
            $table->timestamps();

            //relasi
            $table->foreignUuid('id_dosen')->references('id_dosen')->on('dosen');
            $table->foreignUuid('id_aktivitas')->references('id_aktivitas')->on('list_aktivitas_mahasiswa');

            $table->index(['id_aktivitas', 'id_dosen']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_bimbingan_dosen');
    }
};
