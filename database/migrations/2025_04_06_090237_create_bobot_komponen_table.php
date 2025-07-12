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
        Schema::create('bobot_komponen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_matkul')->references('id')->on('list_mata_kuliah');
            $table->foreignUuid('id_komponen')->references('id')->on('komponen');
            $table->integer('persentase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_komponen');
    }
};
