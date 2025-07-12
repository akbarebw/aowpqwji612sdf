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
        Schema::create('wilayah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('id_level_wilayah');
            $table->string('id_wilayah');
            $table->string('id_negara');
            $table->string('nama_wilayah');
            $table->integer('id_induk_wilayah')->nullable();
            $table->timestamps();

            $table->foreign('id_level_wilayah')->references('id_level_wilayah')->on('level_wilayah');
            
            $table->index(['id_level_wilayah']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah');
    }
};
