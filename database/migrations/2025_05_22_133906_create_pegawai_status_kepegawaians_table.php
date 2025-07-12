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
        Schema::create('pegawai_status_kepegawaians', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('status_kepegawaian_id')->constrained('status_kepegawaian');
            $table->foreignUuid('pegawai_id')->constrained('pegawai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai_status_kepegawaians');
    }
};
