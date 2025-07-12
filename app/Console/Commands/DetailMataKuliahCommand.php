<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DetailMataKuliah;
use App\Services\Api\ApiRequest;

class DetailMataKuliahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:detail-mata-kuliah-command';

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
        $this->info("Memulai sinkronisasi data Detail Mata Kuliah...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetDetailMataKuliah', $params);

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
                DetailMataKuliah::updateOrCreate(
                    ['id_matkul' => $item['id_matkul']],
                    [
                        'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'id_jenis_mata_kuliah' => $item['id_jenis_mata_kuliah'],
                        'id_kelompok_mata_kuliah' => $item['id_kelompok_mata_kuliah'],
                        'sks_mata_kuliah' => $item['sks_mata_kuliah'],
                        'sks_tatap_muka' => $item['sks_tatap_muka'],
                        'sks_praktek' => $item['sks_praktek'],
                        'sks_praktek_lapangan' => $item['sks_praktek_lapangan'] ?? 0,
                        'sks_simulasi' => $item['sks_simulasi'],
                        'metode_kuliah' => $item['metode_kuliah'],
                        'ada_sap' => $item['ada_sap'],
                        'ada_silabus' => $item['ada_silabus'],
                        'ada_bahan_ajar' => $item['ada_bahan_ajar'],
                        'ada_acara_praktek' => $item['ada_acara_praktek'],
                        'ada_diktat' => $item['ada_diktat'],
                        'tanggal_mulai_efektif' => $item['tanggal_mulai_efektif'],
                        'tanggal_selesai_efektif' => $item['tanggal_selesai_efektif']
                    ]
                );


                $this->info("Data Detail Mata Kuliah {$item['id_matkul']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data Detail Mata Kuliah {$item['id_matkul']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
