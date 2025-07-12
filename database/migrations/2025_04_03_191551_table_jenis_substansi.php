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
        Schema::create('jenis_substansi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('id_jenis_substansi')->unique();
            $table->string('nama_jenis_substansi');
            $table->timestamps();
            $table->index('id_jenis_substansi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_substansi');
    }
};
