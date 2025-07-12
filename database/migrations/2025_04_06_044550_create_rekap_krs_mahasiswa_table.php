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
        Schema::create('rekap_krs_mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_program_studi');
            $table->bigInteger('id_periode');
            $table->string('nama_periode');
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->integer('angkatan');
            $table->bigInteger('id_semester');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->decimal('sks_mata_kuliah', 5, 2);
            $table->timestamps();

            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
            $table->foreign('id_semester')->references('id_semester')->on('semester');

            $table->index(['id_prodi','id_matkul', 'id_semester'], 'rekap_krs_mahasiswa_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_krs_mahasiswa');
    }
};
