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
        Schema::create('jalur_evaluasi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('id_jenis_evaluasi');
            $table->string('nama_jenis_evaluasi');
            $table->timestamps();

            $table->index(['id', 'id_jenis_evaluasi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jalur_evaluasi');
    }
};
