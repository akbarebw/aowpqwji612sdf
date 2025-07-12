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
        Schema::create('riwayat_fungsional_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid('id_dosen');
            $table->string('nidn')->nullable();
            $table->string('nama_dosen');
            $table->uuid('id_jabatan_fungsional');
            $table->string('nama_jabatan_fungsional');
            $table->string('sk_jabatan_fungsional');
            $table->date('mulai_sk_jabatan');	
            $table->timestamps();


            //relasi
            $table->foreignUuid('id_dosen')->references('id_dosen')->on('dosen');
            //index
            $table->index('id_dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_fungsional_dosen');
    }
};
