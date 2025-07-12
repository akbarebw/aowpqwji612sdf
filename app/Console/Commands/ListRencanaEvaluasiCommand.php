<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\RencanaEvaluasi;

class ListRencanaEvaluasiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-rencana-evaluasi-command';

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

        
        //
        $this->info("Memulai sinkronisasi data List Rencana Evaluasi...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "10",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetListRencanaEvaluasi', $params);

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
                RencanaEvaluasi::updateOrCreate(
                    ['id_rencana_evaluasi' => $item['id_rencana_evaluasi']],
                    [
                        'id_jenis_evaluasi' => $item['id_jenis_evaluasi'],
                        'jenis_evaluasi' => $item['jenis_evaluasi'],
                        'id_matkul' => $item['id_matkul'],
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                        'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                        'sks_mata_kuliah' => $item['sks_mata_kuliah'],
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'nama_evaluasi' => $item['nama_evaluasi'],
                        'deskripsi_indonesia' => $item['deskripsi_indonesia'] ?? '',
                        'deskrips_inggris' => $item['deskrips_inggris'] ?? '',
                        'nomor_urut' => $item['nomor_urut'] ?? 0,
                        'bobot_evaluasi' => $item['bobot_evaluasi'],
                        'status_sync' => $item['status_sync']
                    ]
                );

                $this->info("Data List Rencana Evaluasi ID {$item['id_jenis_evaluasi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data List Rencana Evaluasi untuk ID {$item['id_jenis_evaluasi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
