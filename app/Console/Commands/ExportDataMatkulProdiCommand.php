<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ExportDataMatkulProdi;

class ExportDataMatkulProdiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-matkul-prodi-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Export Data Matkul Prodi dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Export Data Matkul Prodi...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('ExportDataMatkulProdi', $params);

        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
            return Command::FAILURE;
        }

        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data untuk disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {
            try {
                ExportDataMatkulProdi::updateOrCreate(
                    ['id_matkul' => $item['id_matkul']],
                    [
                        'id_program_studi' => $item['id_program_studi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                        'sks_mata_kuliah' => $item['sks_mata_kuliah'],
                        'id_jenis_mata_kuliah' => $item['id_jenis_mata_kuliah'],
                        'id_kelompok_mata_kuliah' => $item['id_kelompok_mata_kuliah'],
                        'status_sync' => $item['status_sync'],                        
                    ]
                );

                $this->info("Data Export Data Matkul Prodi ID {$item['id_matkul']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_matkul']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
