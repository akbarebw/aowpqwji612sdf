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
        Schema::create('export_data_matkul_prodi', function (Blueprint $table) {
            $table->uuid('id')->primary();  
            $table->uuid('id_program_studi');
            $table->string('nama_program_studi');
            // $table ->uuid('id_matkul');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->decimal('sks_mata_kuliah');
            $table->string('id_jenis_mata_kuliah')->nullable();
            $table->string('id_kelompok_mata_kuliah')->nullable();
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');

            $table->index(['id_matkul'], 'export_data_matkul_prodi_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_data_matkul_prodi');
    }
};
