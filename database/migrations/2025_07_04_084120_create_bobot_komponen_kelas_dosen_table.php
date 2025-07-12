<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bobot_komponen_kelas_dosen', function (Blueprint $table) {
            $table->id();

            // Sesuaikan dengan char(36)
            $table->char('id_dosen', 36);
            $table->char('id_kelas_kuliah', 36);

            // Asumsikan id_komponen dari tabel numerik
            $table->unsignedBigInteger('id_komponen');

            $table->decimal('persentase', 5, 2);
            $table->timestamps();

            // Index & Foreign Key
            $table->unique(['id_dosen', 'id_kelas_kuliah', 'id_komponen'], 'uniq_bobot_komponen');

            $table->foreign('id_dosen')->references('id_dosen')->on('dosen');
            $table->foreign('id_kelas_kuliah')->references('id_kelas_kuliah')->on('kelas_kuliah');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_komponen_kelas_dosen');
    }
};
