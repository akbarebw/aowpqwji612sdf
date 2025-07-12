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
        Schema::create('export_data_penugasan_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_dosen');
            $table->bigInteger('nidn')->nullable();
            $table->string('nama_dosen');
            $table->string('nama_program_studi')->nullable();
            $table->integer('periode_mengajar');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->bigInteger('id_agama');
            $table->string('nama_agama');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_prodi')->nullable()->references('id_prodi')->on('prodi');
            $table->foreign('id_agama')->references('id_agama')->on('agama');

            $table->index(['id_prodi', 'id_agama']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_data_penugasan_dosen');
    }
};
