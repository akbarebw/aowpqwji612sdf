<?php

namespace App\Console\Commands;


use Carbon\Carbon;
use App\Models\ListMataKuliah;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class ListMataKuliahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-mata-kuliah-command';

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
        $this->info("Memulai sinkronisasi data List Mata Kuliah...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetListMataKuliah', $params);
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
                ListMataKuliah::updateOrCreate(
                    ['id_matkul' => $item['id_matkul']],
                    [
                        'id_jenj_didik' => $item['id_jenj_didik'],
                        'tgl_create' => $item['tgl_create'],
                        'jns_mk' => $item['jns_mk'],
                        'kel_mk' => $item['kel_mk'],
                        'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                        'sks_mata_kuliah' => $item['sks_mata_kuliah'],
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'id_jenis_mata_kuliah' => $item['id_jenis_mata_kuliah'],
                        'id_kelompok_mata_kuliah' => $item['id_kelompok_mata_kuliah'],
                        'sks_tatap_muka' => $item['sks_tatap_muka'],
                        'sks_praktek' => $item['sks_praktek'],
                        'sks_praktek_lapangan' => $item['sks_praktek_lapangan'],
                        'sks_simulasi' => $item['sks_simulasi'],
                        'metode_kuliah' => $item['metode_kuliah'],
                        'ada_sap' => $item['ada_sap'],
                        'ada_silabus' => $item['ada_silabus'],
                        'ada_bahan_ajar' => $item['ada_bahan_ajar'],
                        'ada_acara_praktek' => $item['ada_acara_praktek'],
                        'ada_diktat' => $item['ada_diktat'],
                        'tanggal_mulai_efektif' => Carbon::parse($item['tanggal_mulai_efektif'])->format('Y-m-d H:i:s'),
                        'tanggal_selesai_efektif' => Carbon::parse($item['tanggal_selesai_efektif'])->format('Y-m-d H:i:s'),
                        'nama_kelompok_mata_kuliah' => $item['nama_kelompok_mata_kuliah'],
                        'nama_jenis_mata_kuliah' => $item['nama_jenis_mata_kuliah'],
                        'status_sync' => $item['status_sync'],
                    ]
                );
                $this->info("Data List Mata Kuliah ID {$item['id_matkul']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data List Mata Kuliah ID {$item['id_matkul']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
