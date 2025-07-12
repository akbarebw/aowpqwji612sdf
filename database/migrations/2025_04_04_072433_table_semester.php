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
        Schema::create('semester', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('id_semester')->unique();
            $table->integer('id_tahun_ajaran')->nullable();
            $table->string('nama_semester');
            $table->integer('semester');
            $table->integer('a_periode_aktif');
            $table->dateTimeTz('tanggal_mulai');
            $table->dateTimeTz('tanggal_selesai');
            $table->timestamps();

            // $table->foreign('id_tahun_ajaran')
            // ->references('id_tahun_ajaran')
            // ->on('tahun_ajaran')
            // ->nullOnDelete(); 
      

            $table->index(['id_semester', 'id_tahun_ajaran']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semester');
    }
};
