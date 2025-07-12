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
        Schema::create('jenis_sertifikasi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('id_jenis_sertifikasi');
            $table->string('nama_jenis_sertifikasi');
            $table->timestamps();

            $table->index(['id', 'id_jenis_sertifikasi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_sertifikasi');
    }
};
