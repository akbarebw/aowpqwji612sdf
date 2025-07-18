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
        Schema::create('lembaga_pengangkat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('id_lembaga_angkat')->unique();
            $table->string('nama_lembaga_angkat');
            $table->timestamps();
            $table->index('id_lembaga_angkat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga_pengangkat');
    }
};
