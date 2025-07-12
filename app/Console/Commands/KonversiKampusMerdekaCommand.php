<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\KonversiKampusMerdeka;

class KonversiKampusMerdekaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:konversi-kampus-merdeka-command';

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
        $this->info("Memulai sinkronisasi data List Aktivitas Mahasiswa...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetListKonversiKampusMerdeka', $params);

        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
            return Command::FAILURE;
        }

        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data baru yang perlu disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {

            try {
                KonversiKampusMerdeka::updateOrCreate(
                    ['id_konversi_aktivitas' => $item['id_konversi_aktivitas']] ?? NULL,
                    [
                        'id_aktivitas' => $item['id_aktivitas'] ?? NULL,
                        'id_matkul' => $item['id_matkul'] ?? NULL,
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'] ?? NULL,
                        'judul' => $item['judul'] ?? NULL,
                        'id_anggota' => $item['id_anggota'] ?? NULL,
                        'nama_mahasiswa' => $item['nama_mahasiswa'] ?? NULL,
                        'nim' => $item['nim'] ?? NULL,
                        'sks_mata_kuliah' => $item['sks_mata_kuliah'] ?? NULL,
                        'nilai_angka' => $item['nilai_angka'] ?? NULL,
                        'nilai_indeks' => $item['nilai_indeks'] ?? NULL,
                        'nilai_huruf' => $item['nilai_huruf'] ?? NULL,
                        'id_semester' => $item['id_semester'] ?? NULL,
                        'nama_semester' => $item['nama_semester'] ?? NULL,
                        'status_sync' => $item['status_sync'] ?? NULL,
                    ]
                );

                $this->info("Data konversi kampus merdeka ID {$item['id_konversi_aktivitas']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data konversi kampus merdeka ID {$item['id_konversi_aktivitas']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
