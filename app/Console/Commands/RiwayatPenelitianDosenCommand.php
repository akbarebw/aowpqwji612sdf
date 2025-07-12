<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\RiwayatPenelitianDosen;

class RiwayatPenelitianDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:riwayat-penelitian-dosen-command';

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
        $this->info("Memulai sinkronisasi data Riwayat Penelitian Dosen...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetRiwayatPenelitianDosen', $params);

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
                RiwayatPenelitianDosen::updateOrCreate(
                    ['id_dosen' => $item['id_dosen']],
                    [
                        'nidn'=> $item['nidn'],
                        'nama_dosen'=> $item['nama_dosen'],
                        'id_penelitian'=> $item['id_penelitian'],
                        'judul_penelitian'=> $item['judul_penelitian'],
                        'id_kelompok_bidang'=> $item['id_kelompok_bidang'],
                        'kode_kelompok_bidang'=> $item['kode_kelompok_bidang'],
                        'nama_kelompok_bidang'=> $item['nama_kelompok_bidang'],
                        'id_lembaga_iptek'=> $item['id_lembaga_iptek'],
                        'nama_lembaga_iptek'=> $item['nama_lembaga_iptek'],
                        'tahun_kegiatan'=> $item['tahun_kegiatan'],
                    ]
                );

                $this->info("Data RiwayatPenelitianDosen ID {$item['id_dosen']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_dosen']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
