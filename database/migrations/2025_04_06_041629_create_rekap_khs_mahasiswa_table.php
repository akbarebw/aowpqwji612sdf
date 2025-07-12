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
        Schema::create('rekap_khs_mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('nama_program_studi');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->integer('angkatan');
            $table->bigInteger('id_periode');
            $table->string('nama_periode');
            $table->string('nama_mata_kuliah');
            $table->decimal('sks_mata_kuliah', 5, 2)->nullable();
            $table->decimal('nilai_angka', 5, 2)->nullable();
            $table->string('nilai_huruf')->nullable();
            $table->decimal('nilai_indeks', 5, 2)->nullable();
            $table->decimal('sks_x_indeks', 7, 4)->nullable();
            $table->timestamps();

            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');                   
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');

            $table->index(['id_prodi', 'id_matkul']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_khs_mahasiswa');
    }
};
