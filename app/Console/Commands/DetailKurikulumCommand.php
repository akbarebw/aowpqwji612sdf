<?php

namespace App\Console\Commands;



use App\Models\DetailKurikulum;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class DetailKurikulumCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:detail-kurikulum-command';

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
        $this->info("Memulai sinkronisasi data Detail Kurikulum...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetDetailKurikulum', $params);

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
                DetailKurikulum::updateOrCreate(
                    ['id_kurikulum' => $item['id_kurikulum']],
                    [
                        'nama_kurikulum' => $item['nama_kurikulum'],
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'id_semester' => $item['id_semester'],
                        'semester_mulai_berlaku' => $item['semester_mulai_berlaku'],
                        'jumlah_sks_lulus' => $item['jumlah_sks_lulus'],
                        'jumlah_sks_wajib' => $item['jumlah_sks_wajib'],
                        'jumlah_sks_pilihan' => $item['jumlah_sks_pilihan'],
                        'status_sync' => $item['status_sync'],
                    ]
                );

                $this->info("Data Detail Kurikulum ID {$item['id_kurikulum']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data Detail Kurikulum ID {$item['id_kurikulum']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
