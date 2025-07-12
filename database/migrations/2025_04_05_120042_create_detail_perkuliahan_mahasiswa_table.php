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
        Schema::create('detail_perkuliahan_mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('nama_program_studi');
            $table->integer('angkatan');
            $table->bigInteger('id_semester');
            $table->string('nim');
            $table->string('nama_mahasiswa');   
            $table->string('nama_semester');
            $table->foreignUuid('id_status_mahasiswa')->references('id_status_mahasiswa')->on('status_mahasiswa');
            $table->string('nama_status_mahasiswa');
            $table->decimal('ips', 3, 2)->nullable();
            $table->decimal('ipk', 3, 2)->nullable();
            $table->integer('sks_semester')->nullable();
            $table->integer('sks_total')->nullable();
            $table->string('status_sync');
            $table->timestamps();

            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_semester')->references('id_semester')->on('semester');
            
            $table->index(['id_prodi', 'id_semester', 'id_status_mahasiswa'], 'index_detail_perkuliahan_mhs');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_perkuliahan_mahasiswa');
    }
};
