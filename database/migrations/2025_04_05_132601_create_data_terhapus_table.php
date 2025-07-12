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
        Schema::create('data_terhapus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_mahasiswa');
            $table->string('nama_mahasiswa');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->datetime('tanggal_lahir');
            $table->string('nama_ibu_kandung');
            $table->string('agama');   
            $table->bigInteger('id_agama');         
            $table->timestamps();

            $table->foreign('id_agama')->references('id_agama')->on('agama');

            $table->index('id_agama');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_terhapus');
    }
};
