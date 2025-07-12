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
        Schema::create('riwayat_pendidikan_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_dosen');
            $table->string('nidn')->nullable();
            $table->string('nama_dosen');
            $table->integer('id_bidang_studi');
            $table->string('nama_bidang_studi');
            $table->integer('id_jenjang_pendidikan')->nullable();
            $table->string('nama_jenjang_pendidikan');
            $table->integer('id_gelar_akademik')->nullable();
            $table->string('nama_gelar_akademik')->nullable();
            $table->uuid('id_perguruan_tinggi')->nullable();
            $table->string('nama_perguruan_tinggi');
            $table->string('fakultas')->nullable();
            $table->integer('tahun_lulus')->nullable();
            $table->integer('sks_lulus');
            $table->decimal('ipk');
            $table->timestamps();

            //relasi
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen');
            $table->foreign('id_jenjang_pendidikan')->references('id_jenjang_didik')->on('jenjang_pendidikan');
            $table->foreign('id_perguruan_tinggi')->references('id_perguruan_tinggi')->on('all_profil_pt');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pendidikan_dosen');
    }
};
