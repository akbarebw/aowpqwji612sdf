<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\PenugasanSemuaDosen;

class PenugasanSemuaDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:penugasan-semua-dosen-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Penugasn Semua Dosen Kelas...");

        $apiRequest = new ApiRequest();

        $params = [
            "filter" => "",
            'order' => '',
            'limit' => '',
            'offset' => '',
        ];

        $response = $apiRequest->sendRequest('GetListPenugasanSemuaDosen', $params);


        // Cek error dari response
        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat mengakses API: " . $response['error']);
            return Command::FAILURE; // Mengembalikan error status
        }

        // Ambil data jika tidak ada error
        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data baru yang perlu disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {
            try {
                PenugasanSemuaDosen::updateOrCreate(
                    [
                        "id_registrasi_dosen" => $item['id_registrasi_dosen'],
                    ],
                    [
                        "id_dosen" => $item['id_dosen'],
                        "nama_dosen" => $item['nama_dosen'],
                        "nidn" => $item['nidn'],
                        "jenis_kelamin" => $item['jenis_kelamin'],
                        "id_tahun_ajaran" => $item['id_tahun_ajaran'],
                        "nama_tahun_ajaran" => $item['nama_tahun_ajaran'],
                        "id_prodi" => $item['id_prodi'],
                        "program_studi" => $item['program_studi'],
                        "nomor_surat_tugas" => $item['nomor_surat_tugas'],
                        "tanggal_surat_tugas" => $item['tanggal_surat_tugas'],
                        "apakah_homebase" => $item['apakah_homebase'],
                    ]
                );
                $this->info("Penugasan Semua Dosen  {$item['id_registrasi_dosen']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan Penugasan Semua Dosen ID {$item['id_registrasi_dosen']}: " . $e->getMessage());
            }
        }
        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;

    }
}
