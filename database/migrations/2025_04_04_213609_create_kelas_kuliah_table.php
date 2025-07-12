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
        Schema::create('kelas_kuliah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_kelas_kuliah')->unique();
            // $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->bigInteger('id_semester');
            $table->string('nama_semester');
            // $table->uuid('id_matkul');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->string('nama_kelas_kuliah');
            $table->decimal('sks');
            $table->longText('id_dosen')->nullable();
            $table->longText('nama_dosen')->nullable();
            $table->integer('jumlah_mahasiswa');
            $table->integer('apa_untuk_pditt');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_semester')->references('id_semester')->on('semester');
            $table->uuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
            // $table->foreignUuid('id_dosen')->references('id_dosen')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_kuliah');
    }
};
