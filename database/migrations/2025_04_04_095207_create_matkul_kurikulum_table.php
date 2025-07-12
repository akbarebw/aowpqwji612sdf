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
        Schema::create('matkul_kurikulum', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('tgl_create')->nullable();
            $table->string('nama_kurikulum')->nullable();
            $table->string('kode_mata_kuliah')->nullable();
            $table->string('nama_mata_kuliah')->nullable();
            $table->string('nama_program_studi')->nullable();
            $table->integer('semester')->nullable();
            $table->string('semester_mulai_berlaku')->nullable();
            $table->integer('sks_mata_kuliah')->nullable();
            $table->integer('sks_tatap_muka')->nullable();
            $table->integer('sks_praktek')->nullable();
            $table->integer('sks_praktek_lapangan')->nullable();
            $table->integer('sks_simulasi')->nullable();
            $table->integer('apakah_wajib')->nullable();
            $table->string('status_sync')->nullable();
            $table->timestamps();

            $table->bigInteger('id_semester');

            $table->foreignUuid('id_kurikulum')->references('id_kurikulum')->on('kurikulum');
            $table->foreign('id_semester')->references('id_semester')->on('semester');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            // $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
            $table->uuid('id_matkul')->refrences('id_matkul')->on('list_mata_kuliah');
            $table->index(['id_kurikulum', 'id_matkul', 'id_prodi', 'id_semester'], 'index_matkul_kurikulum');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matkul_kurikulum');
    }
};
