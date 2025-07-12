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
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_kurikulum')->unique();
            $table->string('nama_kurikulum');
            $table->string('nama_program_studi');
            $table->bigInteger('id_semester');
            $table->string('semester_mulai_berlaku');
            $table->integer('jumlah_sks_lulus');
            $table->integer('jumlah_sks_wajib');
            $table->integer('jumlah_sks_pilihan');
            $table->integer('jumlah_sks_mata_kuliah_wajib')->nullable();
            $table->integer('jumlah_sks_mata_kuliah_pilihan')->nullable();
            $table->timestamps();

            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_semester')->references('id_semester')->on('semester');

            $table->index(['id_kurikulum', 'id_prodi', 'id_semester']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum');
    }
};
