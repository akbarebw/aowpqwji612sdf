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
        Schema::create('jenis_sms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('id_jenis_sms')->unique();
            $table->string('nama_jenis_sms');
            $table->timestamps();
            $table->index('id_jenis_sms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_sms');
    }
};
