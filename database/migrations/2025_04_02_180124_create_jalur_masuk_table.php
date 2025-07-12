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
        Schema::create('jalur_masuk', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('id_jalur_masuk');
            $table->string('nama_jalur_masuk');
            $table->timestamps();

            $table->index(['id','id_jalur_masuk']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jalur_masuk');
    }
};
