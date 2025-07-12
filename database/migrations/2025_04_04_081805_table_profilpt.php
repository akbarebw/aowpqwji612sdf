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
        Schema::create('profil_pt', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_perguruan_tinggi')->unique();
            $table->integer('kode_perguruan_tinggi');
            $table->string('nama_perguruan_tinggi');
            $table->string('telepon');
            $table->string('faximile');
            $table->string('email');
            $table->string('website');
            $table->string('jalan');
            $table->string('dusun')->nullable();
            $table->string('rt_rw')->nullable();
            $table->string('kelurahan');
            $table->integer('kode_pos'); 
            $table->string('id_wilayah');
            $table->string('nama_wilayah');
            $table->string('lintang_bujur');
            $table->string('bank')->nullable();
            $table->string('unit_cabang')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->integer('mbs');  
            $table->integer('luas_tanah_milik');
            $table->integer('luas_tanah_bukan_milik');
            $table->string('sk_pendirian');
            $table->dateTimeTz('tanggal_sk_pendirian');
            $table->integer('id_status_milik');
            $table->string('nama_status_milik');
            $table->string('status_perguruan_tinggi');
            $table->string('sk_izin_operasional')->nullable();
            $table->date('tanggal_izin_operasional')->nullable();
            $table->timestamps();

            $table->index(['id_perguruan_tinggi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profilpt');

    }
};
