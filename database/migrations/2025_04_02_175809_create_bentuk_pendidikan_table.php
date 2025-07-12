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
        Schema::create('bentuk_pendidikan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('id_bentuk_pendidikan');
            $table->string('nama_bentuk_pendidikan');
            $table->timestamps();

            $table->index(['id','id_bentuk_pendidikan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bentuk_pendidikan');
    }
};
