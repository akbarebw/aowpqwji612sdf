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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_matkul')->unique();
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->integer('sks_mata_kuliah');
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->string('nama_program_studi');
            $table->string('id_jenis_mata_kuliah')->nullable();
            $table->string('id_kelompok_mata_kuliah') ->nullable();
            $table->timestamps();

            $table->index(['id_prodi', 'id_matkul']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
