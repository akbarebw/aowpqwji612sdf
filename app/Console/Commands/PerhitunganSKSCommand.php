<?php

namespace App\Console\Commands;

use App\Models\PerhitunganSKS;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class PerhitunganSKSCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:perhitungan-s-k-s-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Perhitunga SKS dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Perhitungan SKS...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetPerhitunganSKS', $params);

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
                PerhitunganSKS::updateOrCreate(
                    ['id_kelas_kuliah' => $item['id_kelas_kuliah']],
                    [
                        'id_registrasi_dosen' => $item['id_registrasi_dosen'] ?? "",
                        'id_dosen' => $item['id_dosen'] ?? "",
                        'nidn' => $item['nidn'] ?? "",
                        'nama_dosen' => $item['nama_dosen'] ?? "",
                        'nama_kelas_kuliah' => $item['nama_kelas_kuliah'] ?? "",
                        'id_substansi' => $item['id_substansi'] ?? "",
                        'nama_substansi' => $item['nama_substansi'] ?? "",
                        'rencana_minggu_pertemuan' => $item['rencana_minggu_pertemuan'] ?? "",
                        'perhitungan_sks' => $item['perhitungan_sks'] ?? "",
                    ]
                );
                $this->info("Data Perhitungan SKS ID {$item['id_kelas_kuliah']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data Perhitungan SKS ID {$item['id_kelas_kuliah']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
