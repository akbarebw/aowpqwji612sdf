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
        Schema::create('rencana_pembelajaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_rencana_ajar');
            $table->string('nama_mata_kuliah');
            $table->string('kode_mata_kuliah');
            $table->integer('sks_mata_kuliah');
            $table->string('nama_program_studi');
            $table->integer('pertemuan');
            $table->longText('materi_indonesia');
            $table->longText('materi_inggris')->nullable();
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->uuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_pembelajaran');
    }
};
