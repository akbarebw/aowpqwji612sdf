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
        Schema::create('riwayat_pangkat_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid('id_dosen');
            $table->string('nidn')->nullable();
            $table->string('nama_dosen');
            $table->integer('id_pangkat_golongan');
            $table->string('nama_pangkat_golongan');
            $table->string('sk_pangkat');
            $table->date('tanggal_sk_pangkat');
            $table->date('mulai_sk_pangkat');
            $table->integer('masa_kerja_dalam_tahun');
            $table->integer('masa_kerja_dalam_bulan');
            $table->timestamps();


            //relasi
            $table->foreignUuid('id_dosen')->references('id_dosen')->on('dosen');
            $table->foreign('id_pangkat_golongan')->references('id_pangkat_golongan')->on('pangkat_golongan');
            $table->index(['id_pangkat_golongan','id_dosen']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pangkat_dosen');
    }
};
