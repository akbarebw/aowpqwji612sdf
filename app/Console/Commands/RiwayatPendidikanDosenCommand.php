<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\RiwayatPendidikanDosen;

class RiwayatPendidikanDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:riwayat-pendidikan-dosen-command';

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
        $this->info("Memulai sinkronisasi data Riwayat Pendidikan Dosen...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetRiwayatPendidikanDosen', $params);

        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
            return Command::FAILURE;
        }

        $data = json_decode(json_encode($response['data']), true);
        if (empty($data)) {
            $this->warn("Tidak ada data untuk disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {
            // $this->info("Memproses ID: " . json_encode($item));
            // dd($item);
            try {
                RiwayatPendidikanDosen::updateOrCreate(
                    ['id_dosen' => $item['id_dosen']],
                    [
                        'nidn' => $item['nidn'],
                        'nama_dosen' => $item['nama_dosen'],
                        'id_bidang_studi' => $item['id_bidang_studi'],
                        'nama_bidang_studi' => $item['nama_bidang_studi'],
                        'id_jenjang_pendidikan' => $item['id_jenjang_pendidikan'],
                        'nama_jenjang_pendidikan' => $item['nama_jenjang_pendidikan'],
                        'id_gelar_akademik' => $item['id_gelar_akademik'],
                        'nama_gelar_akademik' => $item['nama_gelar_akademik'],
                        'id_perguruan_tinggi' => $item['id_perguruan_tinggi'],
                        'nama_perguruan_tinggi' => $item['nama_perguruan_tinggi'],
                        'fakultas' => $item['fakultas'],
                        'tahun_lulus' => $item['tahun_lulus'],
                        'sks_lulus' => $item['sks_lulus'],
                        'ipk' => $item['ipk']
                    ]
                );

                $this->info("Data Riwayat Pendidikan Dosen ID {$item['id_dosen']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_dosen']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
