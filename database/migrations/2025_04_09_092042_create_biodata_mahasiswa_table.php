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
        Schema::create('biodata_mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_mahasiswa');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->uuid('id_mahasiswa')->nullable();
            $table->bigInteger('id_agama');
            $table->string('nama_agama');
            $table->longtext('nik')->nullable();
            $table->bigInteger('nisn')->nullable();
            $table->bigInteger('npwp')->nullable();
            $table->string('id_negara');
            $table->string('kewarganegaraan');
            $table->string('jalan')->nullable();
            $table->string('dusun')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('id_wilayah');
            $table->string('nama_wilayah')->nullable();
            $table->bigInteger('id_jenis_tinggal')->nullable();
            $table->string('nama_jenis_tinggal')->nullable();
            $table->bigInteger('id_alat_transportasi')->nullable();
            $table->string('nama_alat_transportasi')->nullable();
            $table->string('telepon')->nullable();
            $table->string('handphone')->nullable();
            $table->string('email')->nullable();
            $table->integer('penerima_kps')->nullable();
            $table->integer('nomor_kps')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->integer('id_pendidikan_ayah')->nullable();
            $table->string('nama_pendidikan_ayah')->nullable();
            $table->integer('id_pekerjaan_ayah')->nullable();
            $table->string('nama_pekerjaan_ayah')->nullable();
            $table->integer('id_penghasilan_ayah')->nullable();
            $table->string('nama_penghasilan_ayah')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nama_ibu_kandung');
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->integer('id_pendidikan_ibu')->nullable();
            $table->string('nama_pendidikan_ibu')->nullable();
            $table->integer('id_pekerjaan_ibu')->nullable();
            $table->string('nama_pekerjaan_ibu')->nullable();
            $table->integer('id_penghasilan_ibu')->nullable();
            $table->string('nama_penghasilan_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->integer('id_pendidikan_wali')->nullable();
            $table->string('nama_pendidikan_wali')->nullable();
            $table->integer('id_pekerjaan_wali')->nullable();
            $table->string('nama_pekerjaan_wali')->nullable();
            $table->integer('id_penghasilan_wali')->nullable();
            $table->string('nama_penghasilan_wali')->nullable();
            $table->integer('id_kebutuhan_khusus_mahasiswa');
            $table->string('nama_kebutuhan_khusus_mahasiswa');
            $table->integer('id_kebutuhan_khusus_ayah');
            $table->string('nama_kebutuhan_khusus_ayah');
            $table->integer('id_kebutuhan_khusus_ibu');
            $table->string('nama_kebutuhan_khusus_ibu');
            $table->timestamps();

            $table->foreign('id_agama')->references('id_agama')->on('agama');
            $table->foreign('id_jenis_tinggal')->references('id_jenis_tinggal')->on('jenis_tinggal');
            $table->foreign('id_alat_transportasi')->references('id_alat_transportasi')->on('alat_transportasi');

            $table->index(['id_agama', 'id_jenis_tinggal', 'id_alat_transportasi'], 'index_biodatamhs');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_mahasiswa');
    }
};
