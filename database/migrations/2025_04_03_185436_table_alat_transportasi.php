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
        Schema::create('alat_transportasi', function (Blueprint $table) {
            $table->uuid('id')->primary();  
            $table->bigInteger('id_alat_transportasi')->unique();
            $table->string('nama_alat_transportasi');
            $table->timestamps();
            $table->index('id_alat_transportasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_transportasi');
    }
};
