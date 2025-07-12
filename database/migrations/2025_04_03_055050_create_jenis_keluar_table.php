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
        Schema::create('jenis_keluar', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_jenis_keluar')->unique();
            $table->string('jenis_keluar');
            $table->string('apa_mahasiswa');
            $table->timestamps();

            $table->index(['id', 'id_jenis_keluar']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_keluar');
    }
};
