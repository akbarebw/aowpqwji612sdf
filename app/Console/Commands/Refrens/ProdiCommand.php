<?php

namespace App\Console\Commands\Refrens;

use App\Models\Prodi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class ProdiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prodi-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Prodi dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Prodi...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetProdi', $params);

        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat mengakses API: " . $response['error']);
            return Command::FAILURE; // Mengembalikan error status
        }

        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data baru yang perlu disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {
            try {
                Prodi::updateOrCreate(
                    [
                        'id_prodi' => $item['id_prodi'],
                        // 'id_perguruan_tinggi' => $item['id_perguruan_tinggi'],
                        // 'kode_perguruan_tinggi' => $item['kode_perguruan_tinggi'],
                        // 'nama_perguruan_tinggi' => $item['nama_perguruan_tinggi'],
                        'kode_program_studi' => $item['kode_program_studi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'status' => $item['status'],
                        'id_jenjang_pendidikan' => $item['id_jenjang_pendidikan'],
                        'nama_jenjang_pendidikan' => $item['nama_jenjang_pendidikan'],
                    ]
                );
                $this->info("Data Prodi ID {$item['nama_program_studi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data Prodi ID {$item['nama_program_studi']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
