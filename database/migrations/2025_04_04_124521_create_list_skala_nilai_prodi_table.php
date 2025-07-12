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
        Schema::create('list_skala_nilai_prodi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('tgl_create');
            $table->uuid('id_bobot_nilai');
            // $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->string('nilai_huruf');
            $table->string('nilai_indeks');
            $table->string('bobot_minimum');
            $table->string('bobot_maksimum');
            $table->date('tanggal_mulai_efektif');
            $table->date('tanggal_akhir_efektif');
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_skala_nilai_prodi');
    }
};
