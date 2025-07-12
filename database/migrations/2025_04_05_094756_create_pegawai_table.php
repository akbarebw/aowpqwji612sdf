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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('nip');
            $table->string('kontak');
            $table->string('foto')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('umur');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->bigInteger('id_agama');
            $table->foreign('id_agama')->references('id_agama')->on('agama');

            $table->text('alamat')->nullable();
            $table->string('kewaranegaraan')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('kontak_darurat')->nullable();

            // $table->foreignUuid('jabatan_struktural_id')->references('id')->on('jabatan_struktural');
            $table->foreignUuid('user_id')->nullable()->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
