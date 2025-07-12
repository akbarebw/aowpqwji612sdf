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
        Schema::create('pengajuan_fungsional_dosens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ijazah_terakhir')->nullable();
            $table->string('akreditasi_prodi')->nullable();
            $table->string('skp')->nullable();
            $table->string('bukti_bkd')->nullable();
            $table->string('surat_pengantar')->nullable();
            $table->string('sk_pangkat')->nullable();
            $table->string('sk_jabatan')->nullable();
            $table->string('sertifikasi_dosen')->nullable();

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
        Schema::dropIfExists('pengajuan_fungsional_dosens');
    }
};
