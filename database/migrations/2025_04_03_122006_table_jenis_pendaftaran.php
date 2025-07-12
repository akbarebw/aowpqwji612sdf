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
        Schema::create('jenis_pendaftaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_jenis_daftar')->unique();
            $table->string('nama_jenis_daftar');
            $table->integer('untuk_daftar_sekolah');
            $table->timestamps();
            $table->index('id_jenis_daftar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pendaftaran');
    }
};
