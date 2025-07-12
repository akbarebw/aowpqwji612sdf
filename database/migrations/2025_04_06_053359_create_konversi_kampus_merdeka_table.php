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
        Schema::create('konversi_kampus_merdeka', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_konversi_aktivitas');
            $table->string('nama_mata_kuliah');
            $table->uuid('id_aktivitas');
            $table->string('judul');
            $table->uuid('id_anggota');
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->decimal('sks_mata_kuliah', 4, 2);
            $table->decimal('nilai_angka', 5, 2);
            $table->decimal('nilai_indeks', 3, 2);
            $table->string('nilai_huruf');
            $table->bigInteger('id_semester');
            $table->string('nama_semester');
            $table->string('status_sync');
            $table->timestamps();

            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
            $table->foreign('id_semester')->references('id_semester')->on('semester');

            $table->index(['id_matkul', 'id_semester']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konversi_kampus_merdeka');
    }
};
