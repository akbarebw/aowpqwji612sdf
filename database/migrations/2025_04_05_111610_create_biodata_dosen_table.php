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
        Schema::create('biodata_dosen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid('id_dosen');
            $table->string('nama_dosen');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->bigInteger('id_agama');
            $table->string('nama_agama');
            $table->integer('id_status_aktif');
            $table->string('nama_status_aktif');
            $table->string('nidn')->nullable();
            $table->string('nama_ibu_kandung');
            $table->string('nik')->nullable();
            $table->string('nip')->nullable();
            $table->string('npwp')->nullable();
            $table->integer('id_jenis_sdm');
            $table->string('nama_jenis_sdm');
            $table->string('no_sk_cpns')->nullable();
            $table->date('tanggal_sk_cpns')->nullable();
            $table->longText('no_sk_pengangkatan')->nullable();
            $table->date('mulai_sk_pengangkatan')->nullable();
            $table->integer('id_lembaga_angkat')->nullable();
            $table->string('nama_lembaga_pengangkatan')->nullable();
            $table->integer('id_pangkat_golongan')->nullable();
            $table->string('nama_pangkat_golongan')->nullable();
            $table->integer('id_sumber_gaji')->nullable();
            $table->string('nama_sumber_gaji')->nullable();
            $table->string('jalan')->nullable();
            $table->string('dusun')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('ds_kel')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('id_wilayah')->nullable();
            $table->string('nama_wilayah')->nullable();
            $table->string('telepon')->nullable();
            $table->string('handphone')->nullable();
            $table->string('email')->nullable();
            $table->string('status_pernikahan')->nullable();
            $table->string('nama_suami_istri')->nullable();
            $table->string('nip_suami_istri')->nullable();
            $table->date('tanggal_mulai_pns')->nullable();
            $table->string('id_pekerjaan_suami_istri')->nullable();
            $table->string('nama_pekerjaan_suami_istri')->nullable();
            $table->timestamps();

            //rerasi
            $table->foreignUuid('id_dosen')->references('id_dosen')->on('dosen');
            $table->foreign('id_agama')->references('id_agama')->on('agama');
            $table->foreign('id_status_aktif')->references('id_status_aktif')->on('status_keaktifan_pegawai');
            $table->foreign('id_lembaga_angkat')->references('id_lembaga_angkat')->on('lembaga_pengangkat');
            $table->foreign('id_pangkat_golongan')->references('id_pangkat_golongan')->on('pangkat_golongan');

            $table->index(['id_dosen', 'id_agama', 'id_status_aktif', 'id_jenis_sdm', 'id_lembaga_angkat', 'id_pangkat_golongan'], 'biodata_dosen_index');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_dosen');
    }
};
