<?php

namespace App\Console\Commands\Refrens;

use App\Models\Kurikulum;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class KurikulumCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kurikulum-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Kurikulum dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Kurikulum...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetListKurikulum', $params);

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
                Kurikulum::updateOrCreate(
                    
                    [
                        'id_kurikulum' => $item['id_kurikulum'],
                        'id_semester' => $item['id_semester'],
                        'nama_kurikulum' => $item['nama_kurikulum'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'id_prodi' => $item['id_prodi'],                      
                        'semester_mulai_berlaku' => $item['semester_mulai_berlaku'],
                        'jumlah_sks_lulus' => $item['jumlah_sks_lulus'],
                        'jumlah_sks_wajib' => $item['jumlah_sks_wajib'],
                        'jumlah_sks_pilihan' => $item['jumlah_sks_pilihan'],
                        'jumlah_sks_mata_kuliah_wajib' => $item['jumlah_sks_mata_kuliah_wajib'],
                        'jumlah_sks_mata_kuliah_pilihan' => $item['jumlah_sks_mata_kuliah_pilihan']
                    ]
                );

                $this->info("Data Kurikulum ID {$item['id_kurikulum']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_kurikulum']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
