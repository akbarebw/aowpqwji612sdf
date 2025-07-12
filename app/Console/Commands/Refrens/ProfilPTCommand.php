<?php

namespace App\Console\Commands\Refrens;

use App\Models\ProfilPt;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class ProfilPTCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:profil-pt-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Profil PT dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Profil PT...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetProfilPT', $params);

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
                ProfilPt::updateOrCreate(
                    [
                        'id_perguruan_tinggi' => $item['id_perguruan_tinggi'],
                        'kode_perguruan_tinggi' => $item['kode_perguruan_tinggi'],
                        'nama_perguruan_tinggi' => $item['nama_perguruan_tinggi'],
                        'telepon' => $item['telepon'],
                        'faximile' => $item['faximile'],
                        'email' => $item['email'],
                        'website' => $item['website'],
                        'jalan' => $item['jalan'],
                        'dusun' => $item['dusun'],
                        'rt_rw' => $item['rt_rw'],
                        'kelurahan' => $item['kelurahan'],
                        'kode_pos' => $item['kode_pos'],
                        'id_wilayah' => $item['id_wilayah'],
                        'nama_wilayah' => $item['nama_wilayah'],
                        'lintang_bujur' => $item['lintang_bujur'],
                        'bank' => $item['bank'],
                        'unit_cabang' => $item['unit_cabang'],
                        'nomor_rekening' => $item['nomor_rekening'],
                        'mbs' => $item['mbs'],
                        'luas_tanah_milik' => $item['luas_tanah_milik'],
                        'luas_tanah_bukan_milik' => $item['luas_tanah_bukan_milik'],
                        'sk_pendirian' => $item['sk_pendirian'],
                        'tanggal_sk_pendirian' => $item['tanggal_sk_pendirian'],
                        'id_status_milik' => $item['id_status_milik'],
                        'nama_status_milik' => $item['nama_status_milik'],
                        'status_perguruan_tinggi' => $item['status_perguruan_tinggi'],
                        'sk_izin_operasional' => $item['sk_izin_operasional'],
                        'tanggal_izin_operasional' => $item['sk_izin_operasional'],

                    ]
                );

                $this->info("Data Profil PT ID {$item['id_perguruan_tinggi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_perguruan_tinggi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
