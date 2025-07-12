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
        Schema::create('nilai_has_bobot_komponen', function (Blueprint $table) {
            $table->foreignUuid('bobot_komponen_id')->references('id')->on('bobot_komponen');
            $table->foreignUuid('nilai_id')->references('id')->on('nilai'); 
            $table->primary(['bobot_komponen_id', 'nilai_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_has_bobot_komponen');
    }
};
