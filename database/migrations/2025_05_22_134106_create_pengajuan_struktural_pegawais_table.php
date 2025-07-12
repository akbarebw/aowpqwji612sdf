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
        Schema::create('pengajuan_struktural_pegawais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('sk_pangkat_terakhir')->nullable();
            $table->string('sk_jabatan_struktural')->nullable();
            $table->string('skp')->nullable();
            $table->string('ijazah_transkrip_terakhir')->nullable();
            $table->string('kartu_pegawai')->nullable();
            $table->string('sk_cpns')->nullable();
            $table->string('surat_pengantar')->nullable();
            $table->string('dokumen_terkait')->nullable();
            $table->foreignUuid('jabatan_sebelumnya')->nullable()->constrained('jabatan_struktural');
            $table->foreignUuid('jabatan_diajukan')->nullable()->constrained('jabatan_struktural');

            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->string('reason')->nullable();
            $table->foreignUuid('created_by')->nullable()->constrained('users');
            $table->foreignUuid('decided_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_struktural_pegawais');
    }
};
