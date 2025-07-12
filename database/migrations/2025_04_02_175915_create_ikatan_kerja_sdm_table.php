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
        Schema::create('ikatan_kerja_sdm', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_ikatan_kerja')->unique();
            $table->string('nama_ikatan_kerja');
            $table->timestamps();

            $table->index(['id','id_ikatan_kerja']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikatan_kerja_sdm');
    }
};
