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
        Schema::create('list_mata_kuliah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('id_jenj_didik');
            $table->dateTimeTz('tgl_create');
            $table->uuid('id_matkul')->unique();
            $table->string('jns_mk')->nullable();
            $table->string('kel_mk')->nullable();
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->decimal('sks_mata_kuliah', 5, 2);
            $table->uuid('id_prodi');
            $table->string('nama_program_studi');
            $table->string('id_jenis_mata_kuliah')->nullable();
            $table->string('id_kelompok_mata_kuliah')->nullable();
            $table->decimal('sks_tatap_muka', 5, 2)->nullable();
            $table->decimal('sks_praktek', 5, 2)->nullable();
            $table->decimal('sks_praktek_lapangan', 5, 2)->nullable();
            $table->decimal('sks_simulasi', 5, 2)->nullable();
            $table->string('metode_kuliah')->nullable();
            $table->integer('ada_sap')->nullable();
            $table->integer('ada_silabus')->nullable();
            $table->integer('ada_bahan_ajar')->nullable();
            $table->integer('ada_acara_praktek')->nullable();
            $table->integer('ada_diktat')->nullable();
            $table->datetime('tanggal_mulai_efektif')->nullable();
            $table->datetime('tanggal_selesai_efektif')->nullable();
            $table->string('nama_kelompok_mata_kuliah')->nullable();
            $table->string('nama_jenis_mata_kuliah')->nullable();
            $table->string('status_sync');
            $table->timestamps();

            $table->foreign('id_jenj_didik')->references('id_jenjang_didik')->on('jenjang_pendidikan');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi');

            $table->index(['id_jenj_didik', 'id_matkul', 'id_prodi']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_mata_kuliah');
    }
};
