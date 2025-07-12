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
        Schema::create('pegawai_jabatan_struktural', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('jabatan_struktural_id')->constrained('jabatan_struktural');
            $table->foreignUuid('pegawai_id')->constrained('pegawai');
            $table->string('status')->default('aktif');
            $table->date('mulai_menjabat')->nullable();
            $table->date('selesai_menjabat')->nullable();
            $table->boolean('is_aktif')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai_jabatan_struktural');
    }
};
