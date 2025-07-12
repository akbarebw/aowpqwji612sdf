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
        Schema::create('jenis_aktivitas', function (Blueprint $table) {
            $table-> uuid('id') ->primary();
            $table->bigInteger('id_jenis_aktivitas');
            $table->string('nama_jenis_aktivitas');
            $table->integer('untuk_kampus_merdeka');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_aktivitas');
    }
};

