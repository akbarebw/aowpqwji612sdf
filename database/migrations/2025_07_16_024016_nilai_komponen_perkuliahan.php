<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nilai_komponen_perkuliahan', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Relasi ke detail nilai (mahasiswa x kelas)
            $table->char('id_detail_nilai', 36);

            // Komponen dasar (misal UTS/UAS), diambil dari master
            $table->foreignUuid('pengaturan_id')->references('id')->on('pengaturan_komponen');

            // Optional: relasi ke bobot khusus jika tersedia
            $table->unsignedBigInteger('id_bobot_komponen')->nullable(); // FK ke bobot_komponen_kelas_dosen

            // Nilai yang diinput
            $table->float('nilai', 5, 2)->nullable();

            $table->timestamps();

            // Foreign keys

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_komponen_perkuliahan');
    }
};
