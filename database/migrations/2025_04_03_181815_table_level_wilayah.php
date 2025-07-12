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
        Schema::create('level_wilayah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('id_level_wilayah')->unique();
            $table->string('nama_level_wilayah');
            $table->timestamps();
            $table->index('id_level_wilayah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_wilayah');
    }
};
