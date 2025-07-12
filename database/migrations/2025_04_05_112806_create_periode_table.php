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
        Schema::create('periode', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid('id_prodi');
            $table->integer('kode_prodi')->nullable();
            $table->string('nama_program_studi');
            $table->string('status_prodi');
            $table->string('jenjang_pendidikan');
            $table->integer('periode_pelaporan');
            $table->integer('tipe_periode');   
            $table->timestamps();
            
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');

            $table->index('id_prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode');
    }
};
