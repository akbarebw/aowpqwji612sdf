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
        Schema::create('perhitungan_sks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_kelas_kuliah');
            $table->uuid('id_registrasi_dosen');
            $table->uuid('id_dosen');
            $table->string('nidn');
            $table->string('nama_dosen');
            $table->string('nama_kelas_kuliah');
            $table->uuid('id_substansi')->nullable();
            $table->string('nama_substansi')->nullable();
            $table->string('rencana_minggu_pertemuan');
            $table->string('perhitungan_sks');
            $table->timestamps();

            // relasi
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen');
            // $table->foreignUuid('id_kelas_kuliah')->references('id')->on('kelas_kuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan_sks');
    }
};
