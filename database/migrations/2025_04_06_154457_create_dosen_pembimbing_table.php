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
        Schema::create('dosen_pembimbing', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->bigInteger('nidn')->nullable();
            $table->string('nama_dosen');
            $table->integer('pembimbing_ke');
            $table->string('jenis_aktivitas');
            $table->timestamps();

            $table->foreignUuid('id_dosen')->references('id_dosen')->on('dosen');
            
            $table->index('id_dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_pembimbing');
    }
};
