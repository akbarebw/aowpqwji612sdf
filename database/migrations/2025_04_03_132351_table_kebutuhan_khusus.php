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
        Schema::create('kebutuhan_khusus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('id_kebutuhan_khusus')->unique();
            $table->string('nama_kebutuhan_khusus');
            $table->timestamps();
            $table->index('id_kebutuhan_khusus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebutuhan_khusus');
    }
};
