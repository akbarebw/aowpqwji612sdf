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
        Schema::create('list_nilai_perkuliahan_mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_mahasiswa')->unique();
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->integer('angkatan');
            $table->string('id_periode_masuk');
            $table->bigInteger('id_semester');
            $table->string('nama_semester');
            $table->uuid('id_status_mahasiswa');
            $table->string('nama_status_mahasiswa');
            $table->decimal('ips')->nullable();
            $table->decimal('ipk')->nullable();
            $table->integer('sks_semester')->nullable();
            $table->integer('sks_total')->nullable();
            $table->integer('biaya_kuliah_smt') ->nullable();
            $table->bigInteger('id_pembiayaan')->nullable();
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_semester')->references('id_semester')->on('semester');
            $table->foreign('id_status_mahasiswa')->references('id_status_mahasiswa')->on('status_mahasiswa');
            $table->foreign('id_pembiayaan')->references('id_pembiayaan')->on('pembiayaan');

            $table->index(['id_registrasi_mahasiswa', 'id_prodi', 'id_semester', 'id_pembiayaan', 'id_status_mahasiswa'], 'index_list_nilai_perkuliahan');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_nilai_perkuliahan_mahasiswa');
    }
};
