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
        Schema::create('rekap_jumlah_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('id_periode');
            $table->string('nama_periode');
            $table->string('nama_program_studi')->nullable();
            $table->integer('jumlah_dosen_homebase');
            $table->integer('is_homebase');
            $table->timestamps();

            $table->foreignUuid('id_prodi')->nullable()->references('id_prodi')->on('prodi')->nullable;

            $table->index('id_prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_jumlah_dosen');
    }
};
