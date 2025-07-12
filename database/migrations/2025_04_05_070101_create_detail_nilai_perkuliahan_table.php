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
        Schema::create('detail_nilai_perkuliahan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->bigInteger('id_semester');
            $table->string('nama_semester');
            // $table->uuid('id_matkul');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->decimal('sks_mata_kuliah');
            // $table->uuid('id_kelas_kuliah');
            $table->string('nama_kelas_kuliah');
            $table->uuid('id_registrasi_mahasiswa');
            $table->uuid('id_mahasiswa');
            // $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->string('jurusan');
            $table->string('angkatan');
            $table->integer('nilai_angka')->nullable();
            $table->decimal('nilai_indeks', 5, 2)->nullable();
            $table->string('nilai_huruf')->nullable();
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_semester')->references('id_semester')->on('semester');
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
            $table->foreignUuid('id_kelas_kuliah')->references('id_kelas_kuliah')->on('kelas_kuliah');

            $table->index(['id_prodi', 'id_semester', 'id_matkul', 'id_kelas_kuliah'], 'index_detail_nilai_perkuliahan');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_nilai_perkuliahan');
    }
};
