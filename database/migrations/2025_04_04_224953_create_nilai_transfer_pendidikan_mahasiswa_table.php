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
        Schema::create('nilai_transfer_pendidikan_mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_transfer')->unique();
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->string('nama_program_studi');
            $table->string('id_periode_masuk');
            $table->string('kode_mata_kuliah_asal');
            $table->string('nama_mata_kuliah_asal');
            $table->integer('sks_mata_kuliah_asal');
            $table->string('nilai_huruf_asal');
            $table->string('kode_matkul_diakui');
            $table->string('nama_mata_kuliah_diakui');
            $table->integer('sks_mata_kuliah_diakui');
            $table->string('nilai_huruf_diakui');
            $table->decimal('nilai_angka_diakui', 3, 2);
            $table->uuid('id_perguruan_tinggi')->nullable();
            $table->uuid('id_aktivitas')->nullable();
            $table->string('judul')->nullable();
            $table->integer('id_jenis_aktivitas')->nullable();
            $table->string('nama_jenis_aktivitas')->nullable();
            $table->bigInteger('id_semester')->nullable();
            $table->string('nama_semester')->nullable();
            $table->string('status_sync');
            $table->timestamps();

            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
            $table->foreign('id_semester')->references('id_semester')->on('semester');

            $table->index(['id_transfer', 'id_prodi', 'id_matkul' , 'id_semester'], 'index_nilai_transfer_pendidikan_mhs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_transfer_pendidikan_mahasiswa');
    }
};
