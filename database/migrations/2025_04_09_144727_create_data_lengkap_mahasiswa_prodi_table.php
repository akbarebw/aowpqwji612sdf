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
        Schema::create('data_lengkap_mahasiswa_prodi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('tanggal_lahir');
            $table->string('nama_program_studi');
            $table->string('nama_status_mahasiswa');
            $table->string('id_status_mahasiswa')->nullable();
            $table->string('nim');
            $table->integer('id_periode_masuk');
            $table->string('nama_periode_masuk');
            $table->uuid('id_registrasi_mahasiswa');
            $table->string('jalur_masuk')->nullable();
            $table->string('nama_jalur_masuk')->nullable();
            $table->uuid('id_mahasiswa');
            $table->string('nama_mahasiswa');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->bigInteger('id_agama');
            $table->string('nama_agama');
            $table->string('nik')->nullable();
            $table->string('nisn')->nullable();
            $table->string('npwp')->nullable();
            $table->string('id_negara');
            $table->string('kewarganegaraan')->nullable();
            $table->string('jalan')->nullable();
            $table->string('dusun')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->integer('kode_pos')->nullable();
            $table->string('id_wilayah');
            $table->string('nama_wilayah')->nullable();
            $table->bigInteger('id_jenis_tinggal')->nullable();
            $table->string('nama_jenis_tinggal')->nullable();
            $table->bigInteger('id_alat_transportasi')->nullable();
            $table->string('nama_alat_transportasi')->nullable();
            $table->string('telepon')->nullable();
            $table->string('handphone')->nullable();
            $table->string('email')->nullable();
            $table->integer('penerima_kps')->default(false);
            $table->integer('nomor_kps')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->integer('id_pendidikan_ayah')->nullable();
            $table->string('nama_pendidikan_ayah')->nullable();
            $table->integer('id_pekerjaan_ayah')->nullable();
            $table->string('nama_pekerjaan_ayah')->nullable();
            $table->integer('id_penghasilan_ayah')->nullable();
            $table->string('nama_penghasilan_ayah')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nama_ibu_kandung')->nullable();
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
            $table->integer('id_kebutuhan_khusus_mahasiswa')->nullable();
            $table->string('nama_kebutuhan_khusus_mahasiswa')->nullable();
            $table->integer('id_kebutuhan_khusus_ayah')->nullable();
            $table->string('nama_kebutuhan_khusus_ayah')->nullable();
            $table->integer('id_kebutuhan_khusus_ibu')->nullable();
            $table->string('nama_kebutuhan_khusus_ibu')->nullable();
            $table->integer('sks_diakui')->nullable();
            $table->uuid('id_perguruan_tinggi_asal')->nullable();
            $table->string('nama_perguruan_tinggi_asal')->nullable();
            $table->uuid('id_prodi_asal')->nullable();
            $table->string('nama_program_studi_asal')->nullable();
            $table->string('status_sync');
        
            $table->timestamps();
        
            $table->foreignUuid('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_agama')->references('id_agama')->on('agama');

            $table->index(['id_prodi', 'id_agama'], 'index_data_lengkap_mahasiswa_prodi');

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_lengkap_mahasiswa_prodi');
    }
};
