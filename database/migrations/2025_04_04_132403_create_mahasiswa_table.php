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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_mahasiswa');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            // $table->uuid('id_perguruan_tinggi');
            $table->string('nipd');
            $table->decimal('ipk')->nullable();
            $table->decimal('total_sks')->nullable();
            $table->uuid('id_sms');
            $table->uuid('id_mahasiswa');
            $table->bigInteger('id_agama');
            $table->string('nama_agama');
            // $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->string('id_status_mahasiswa')->nullable();
            $table->string('nama_status_mahasiswa');
            $table->string('nim');
            $table->string('id_periode');
            $table->string('nama_periode_masuk');
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('id_periode_keluar')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->date('last_update');
            $table->date('tgl_create');
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_perguruan_tinggi')->references('id_perguruan_tinggi')->on('profil_pt');
            $table->foreign('id_agama')->references('id_agama')->on('agama');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            // $table->foreign('id_status_mahasiswa')->references('id_status_mahasiswa')->on('status_mahasiswa');

            $table->index(['id_perguruan_tinggi', 'id_agama', 'id_prodi', 'id_status_mahasiswa'], 'index_mahasiswa');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
