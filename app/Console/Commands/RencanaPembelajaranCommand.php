<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\RencanaPembelajaran;

class RencanaPembelajaranCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rencana-pembelajaran-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Rencana Pembelajaran dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Rencana Pembelajaran...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetListRencanaPembelajaran', $params);

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
                RencanaPembelajaran::updateOrCreate(
                    ['id_rencana_ajar' => $item['id_rencana_ajar']],
                    [
                        'id_matkul' => $item['id_matkul'],
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                        'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                        'sks_mata_kuliah' => $item['sks_mata_kuliah'],
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'pertemuan' => $item['pertemuan'],
                        'materi_indonesia' => $item['materi_indonesia'] ?? '',
                        'materi_inggris' => $item['materi_inggris'],
                        'status_sync' => $item['status_sync']
                    ]
                );

                $this->info("Data Rencana Pembelajaran ID {$item['id_rencana_ajar']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_rencana_ajar']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
