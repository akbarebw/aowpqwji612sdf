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
        Schema::create('detail_mata_kuliah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->string('nama_program_studi');
            $table->string('id_jenis_mata_kuliah')->nullable();
            $table->string('id_kelompok_mata_kuliah')->nullable();
            $table->integer('sks_mata_kuliah')->nullable();
            $table->integer('sks_tatap_muka')->nullable();
            $table->integer('sks_praktek')->nullable();
            $table->integer('sks_praktek_lapangan')->nullable();
            $table->integer('sks_simulasi')->nullable();
            $table->string('metode_kuliah')->nullable();
            $table->string('ada_sap')->nullable();
            $table->string('ada_silabus')->nullable();
            $table->string('ada_bahan_ajar')->nullable();
            $table->string('ada_acara_praktek')->nullable();
            $table->string('ada_diktat')->nullable();
            $table->datetime('tanggal_mulai_efektif')->nullable();
            $table->datetime('tanggal_selesai_efektif')->nullable();
            $table->timestamps();
            $table->uuid('id_matkul')->refrences('id_matkul')->on('list_mata_kuliah');

            // relasi

            $table->foreignUuid('id_prodi')
                    ->references('id_prodi')->on('prodi');

            $table->index(['id_matkul', 'id_prodi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
