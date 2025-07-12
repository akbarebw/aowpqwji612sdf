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
        Schema::create('riwayat_penelitian_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nidn')->nullable();
            $table->string('nama_dosen');
            $table->uuid('id_penelitian');
            $table->string('judul_penelitian');
            $table->uuid('id_kelompok_bidang')->nullable();
            $table->integer('kode_kelompok_bidang')->nullable();
            $table->string('nama_kelompok_bidang')->nullable();
            $table->uuid('id_lembaga_iptek');
            $table->string('nama_lembaga_iptek');
            $table->string('tahun_kegiatan');
            $table->timestamps();

            //relasi
            $table->foreignUuid('id_dosen')->references('id_dosen')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_penelitian_dosen');
    }
};
