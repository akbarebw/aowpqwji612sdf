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
        Schema::create('detail_kelas_kuliah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_program_studi');
            $table->bigInteger('id_semester');
            $table->string('nama_semester');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->string('nama_kelas_kuliah');
            $table->string('bahasan')->nullable();
            $table->date('tanggal_mulai_efektif')->nullable();
            $table->date('tanggal_akhir_efektif')->nullable();
            $table->string('kapasitas')->nullable();
            $table->date('tanggal_tutup_daftar')->nullable();
            $table->string('prodi_penyelenggara')->nullable();
            $table->string('perguruan_tinggi_penyelenggara')->nullable();
            $table->timestamps();

            //relasi
            $table->foreignUuid('id_kelas_kuliah')->references('id_kelas_kuliah')->on('kelas_kuliah');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_semester')->references('id_semester')->on('semester');
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kelas_kuliah');
    }
};
