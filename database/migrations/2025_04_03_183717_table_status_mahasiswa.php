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
            Schema::create('status_mahasiswa', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('id_status_mahasiswa')->unique();
                $table->string('nama_status_mahasiswa');
                $table->timestamps();
                $table->index('id_status_mahasiswa');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('status_mahasiswa');
        }
    };
