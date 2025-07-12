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
        Schema::create('komponen_has_pengaturan', function (Blueprint $table) {
            $table->foreignUuid('komponen_id')->references('id')->on('komponen');
            $table->foreignUuid('pengaturan_id')->references('id')->on('pengaturan_komponen');
            $table->primary(['komponen_id','pengaturan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponen_has_pengaturan');
    }
};
