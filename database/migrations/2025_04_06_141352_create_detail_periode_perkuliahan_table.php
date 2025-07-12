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
        Schema::create('detail_periode_perkuliahan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_program_studi');
            $table->bigInteger('id_semester');
            $table->string('nama_semester');
            $table->integer('jumlah_target_mahasiswa_baru')->nullable();
            $table->integer('jumlah_pendaftar_ikut_seleksi')->nullable();
            $table->integer('jumlah_pendaftar_lulus_seleksi')->nullable();
            $table->integer('jumlah_daftar_ulang')->nullable();
            $table->integer('jumlah_mengundurkan_diri')->nullable();
            $table->date('tanggal_awal_perkuliahan');
            $table->date('tanggal_akhir_perkuliahan');
            $table->integer('jumlah_minggu_pertemuan')->nullable();
            $table->string('status_sync');
            $table->timestamps();

            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_semester')->references('id_semester')->on('semester');

            $table->index(['id_prodi', 'id_semester']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_periode_perkuliahan');
    }
};
