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
        Schema::create('list_nilai_perkuliahan_kelas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid('id_matkul');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            // $table->uuid('id_kelas_kuliah');
            $table->string('nama_kelas_kuliah');
            $table->decimal('sks_mata_kuliah');
            $table->integer('jumlah_mahasiswa_krs');
            $table->integer('jumlah_mahasiswa_dapat_nilai');
            $table->decimal('sks_tm');
            $table->decimal('sks_prak') -> nullable();
            $table->decimal('sks_prak_lap') -> nullable();
            $table->decimal('sks_sim')->nullable();
            $table->string('bahasan_case')->nullable();
            $table->integer('a_selenggara_pditt');
            $table->integer('a_pengguna_pditt');
            $table->integer('kuota_pditt');
            $table->date('tgl_mulai_koas')->nullable();
            $table->date('tgl_selesai_koas')->nullable();
            $table->string('id_mou')->nullable();
            $table->string('id_kls_pditt')->nullable();
            $table->uuid('id_sms');
            $table->bigInteger('id_smt');
            $table->date('tgl_create');
            $table->string('lingkup_kelas')->nullable();
            $table->string('mode_kuliah')->nullable();
            $table->string('nm_smt');
            $table->string('nama_prodi');
            $table->string('status_sync');
            $table->timestamps();

            // relasi
            $table->foreignUuid('id_matkul')->references('id_matkul')->on('list_mata_kuliah');
            $table->foreignUuid('id_kelas_kuliah')->references('id_kelas_kuliah')->on('kelas_kuliah');
            $table->foreign('id_smt')->references('id_semester')->on('semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_nilai_perkuliahan_kelas');
    }
};
