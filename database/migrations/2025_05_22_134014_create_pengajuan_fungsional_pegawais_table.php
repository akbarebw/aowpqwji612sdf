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
        Schema::create('pengajuan_fungsional_pegawais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('sk_pangkat_terakhir')->nullable();
            $table->string('ijazah_transkrip_terakhir')->nullable();
            $table->string('penilaian_angka_kredit')->nullable();
            $table->string('dp3_skp')->nullable();
            $table->string('sertifikat_lulus_ukom')->nullable();
            $table->string('sertifikat_diklat')->nullable();
            $table->foreignUuid('golongan_sebelumnya')->nullable()->constrained('pangkat_golongan');
            $table->foreignUuid('golongan_diajukan')->nullable()->constrained('pangkat_golongan');

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
        Schema::dropIfExists('pengajuan_fungsional_pegawais');
    }
};
