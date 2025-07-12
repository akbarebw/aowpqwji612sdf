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
        Schema::create('status_kepegawaian', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('id_status_pegawai')->unique();
            $table->string('nama_status_pegawai');
            $table->timestamps();
            $table->index('id_status_pegawai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_kepegawaian');
    }
};
