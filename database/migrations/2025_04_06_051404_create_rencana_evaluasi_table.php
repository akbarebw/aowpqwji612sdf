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
        Schema::create('rencana_evaluasi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('id_jenis_evaluasi');
            $table->uuid('id_rencana_evaluasi')->unique();
            $table->string('jenis_evaluasi');
            $table->string('nama_mata_kuliah');
            $table->string('kode_mata_kuliah');
            $table->decimal('sks_mata_kuliah', 5, 2);
            $table->string('nama_program_studi');
            $table->string('nama_evaluasi')->nullable();    
            $table->string('deskripsi_indonesia');
            $table->string('deskrips_inggris');   
            $table->integer('nomor_urut'); 
            $table->decimal('bobot_evaluasi', 7, 4);
            $table->string('status_sync');
            $table->timestamps();

            $table->foreign('id_jenis_evaluasi')->references('id_jenis_evaluasi')->on('jenis_evaluasi');
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('mata_kuliah');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');

            $table->index(['id_jenis_evaluasi', 'id_rencana_evaluasi', 'id_matkul', 'id_prodi'], 'rencana_evaluasi_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_evaluasi');
    }
};
