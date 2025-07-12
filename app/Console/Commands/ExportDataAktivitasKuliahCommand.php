<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ExportDataAktivitasKuliah;

class ExportDataAktivitasKuliahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-aktivitas-kuliah-command';

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
        $this->info("Memulai sinkronisasi data Export Data Aktivitas Kuliah...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('ExportDataAktivitasKuliah', $params);

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
                ExportDataAktivitasKuliah::updateOrCreate(
                    [
                        'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                    ],
                    [
                        "id_periode" => $item['id_periode'],
                        "nama_periode" => $item['nama_periode'],
                        "id_registrasi_mahasiswa" => $item['id_registrasi_mahasiswa'],
                        "nim" => $item['nim'],
                        "nama_mahasiswa" => $item['nama_mahasiswa'],
                        "id_prodi" => $item['id_prodi'],
                        "id_status_mahasiswa" => $item['id_status_mahasiswa'],
                        "nama_status_mahasiswa" => $item['nama_status_mahasiswa'],
                        "ips" => $item['ips'],
                        "sks_semester" => $item['sks_semester'],
                        "ipk" => $item['ipk'],
                        "total_sks" => $item['total_sks'],
                        "status_sync" => $item['status_sync']
                    ]
                );
                $this->info("Data Export Data Aktivitas Kuliah {$item['id_registrasi_mahasiswa']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan Export Data Aktivitas Kuliah {$item['id_registrasi_mahasiswa']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
