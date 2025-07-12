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
        Schema::create('dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_dosen')->unique();
            $table->string('nidn')->nullable();
            $table->text('nip')->nullable();
            $table->string('jenis_kelamin');
            $table->bigInteger('id_agama');
            $table->string('nama_agama');
            $table->date('tanggal_lahir');
            $table->integer('id_status_aktif');
            $table->string('nama_status_aktif');
            $table->timestamps();

            // relasi
            $table->foreign('id_agama')->references('id_agama')->on('agama');
            $table->foreign('id_status_aktif')->references('id_status_aktif')->on('status_keaktifan_pegawai');

            $table->index(['id_dosen', 'id_agama', 'id_status_aktif']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
