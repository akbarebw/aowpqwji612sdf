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
        Schema::create('export_data_aktivitas_kuliah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_periode');
            $table->string('nama_periode');
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            // $table->uuid('id_prodi');
            $table->string('id_status_mahasiswa');
            $table->string('ips')->nullable();
            $table->string('nama_status_mahasiswa');
            $table->decimal('sks_semester')->nullable();
            $table->string('ipk')->nullable();
            $table->decimal('total_sks')->nullable();
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_status_mahasiswa')->references('id_status_mahasiswa')->on('status_mahasiswa');

            $table->index(['id_prodi', 'id_status_mahasiswa'], 'index_export_aktivitas_kuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_data_aktivitas_kuliah');
    }
};
