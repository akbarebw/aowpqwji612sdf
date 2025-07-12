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
        Schema::create('export_data_mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('angkatan');
            $table->uuid('id_mahasiswa');
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->string('program_studi');
            $table->string('periode_masuk');
            $table->string('status_mahasiswa');
            $table->string('nama_jenis_daftar');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->bigInteger('id_agama');
            $table->string('nama_agama');
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreignUuid('id_jenis_daftar')->references('id_jenis_daftar')->on('jenis_pendaftaran');
            $table->foreign('id_agama')->references('id_agama')->on('agama');

            $table->index(['id_prodi', 'id_jenis_daftar', 'id_agama'], 'expodatamhs_index');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_data_mahasiswa');
    }
};
