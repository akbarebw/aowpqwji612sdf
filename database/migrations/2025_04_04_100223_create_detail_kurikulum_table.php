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
        Schema::create('detail_kurikulum', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid('id_kurikulum');
            $table->string('nama_kurikulum');
            // $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->BigInteger('id_semester');
            $table->string('semester_mulai_berlaku');
            $table->integer('jumlah_sks_lulus');
            $table->integer('jumlah_sks_wajib');
            $table->integer('jumlah_sks_pilihan');
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_kurikulum')->references('id_kurikulum')->on('kurikulum');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_semester')->references('id_semester')->on('semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kurikulum');
    }
};
