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
        Schema::create('pangkat_golongan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('id_pangkat_golongan')->unique();
            $table->string('kode_golongan');
            $table->string('nama_pangkat');
            $table->timestamps();

            $table->index('id_pangkat_golongan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pangkat_golongan');
    }
};
