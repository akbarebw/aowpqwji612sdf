<?php

namespace App\Console\Commands;

use App\Models\Prodi;
use Illuminate\Console\Command;
use App\Models\MataKuliah;
use App\Services\Api\ApiRequest;
use Carbon\Carbon;

class MataKuliahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mata-kuliah-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Matakuliah dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Matakuliah...");

        $apiRequest = new ApiRequest();


            $params = [
                'filter' => "",
                'order' => '',
                'limit' => "",
                'offset' => "",
            ];
    
            $response = $apiRequest->sendRequest('GetMataKuliah', $params);

            if (isset($response['error'])) {
                $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
                return Command::FAILURE;
            }

            // Ambil data jika tidak ada error
            $data = $response['data'] ?? [];
            if (empty($data)) {
            $this->warn("Tidak ada data untuk disinkronkan.");
            return Command::SUCCESS;
        }
    
            foreach ($data as $item) {
                try {
                    MataKuliah::updateOrCreate(
                        ['id_matkul' => $item['id_matkul']],
                        [
                            'kode_mata_kuliah' => $item['kode_mata_kuliah'] ?? '',
                            'nama_mata_kuliah' => $item['nama_mata_kuliah'] ?? '',
                            'sks_mata_kuliah' => $item['sks_mata_kuliah'] ?? '',
                            'id_prodi' => $item['id_prodi'] ?? '',
                            'nama_program_studi' => $item['nama_program_studi'] ?? '',
                            'id_jenis_mata_kuliah' => $item['id_jenis_mata_kuliah'] ?? '',
                            'id_kelompok_mata_kuliah' => $item['id_kelompok_mata_kuliah'] ?? '',
                        ]
                    );
                    $this->info("Sinkronkan data ID Matakuliah {$item['id_matkul']} berhasil disinkronkan.");
                } catch (\Exception $e) {
                    $this->error("Gagal sinkronkan data ID Matakuliah {$item['id_matkul']}: " . $e->getMessage());
                }
            }
        
        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
