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
        Schema::create('riwayat_sertifikasi_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nidn');
            $table->string('nama_dosen');
            $table->string('nomor_peserta')->nullable();
            $table->integer('id_bidang_studi');
            $table->string('nama_bidang_studi');
            $table->bigInteger('id_jenis_sertifikasi');
            $table->string('nama_jenis_sertifikasi');
            $table->integer('tahun_sertifikasi');
            $table->string('sk_sertifikasi');
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
        Schema::dropIfExists('riwayat_sertifikasi_dosen');
    }
};
