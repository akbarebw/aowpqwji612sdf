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
        Schema::create('prodi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_prodi')->unique();
            $table->integer('kode_program_studi');
            $table->string('nama_program_studi');
            $table->string('status');
            $table->integer('id_jenjang_pendidikan');
            $table->string('nama_jenjang_pendidikan');
            $table->timestamps();

            $table->foreign('id_jenjang_pendidikan')->references('id_jenjang_didik')->on('jenjang_pendidikan');

            $table->index(['id_prodi', 'id_jenjang_pendidikan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};
