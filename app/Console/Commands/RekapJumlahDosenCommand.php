<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RekapJumlahDosen;
use App\Services\Api\ApiRequest;

class RekapJumlahDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rekap-jumlah-dosen-command';

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
        $this->info("Memulai sinkronisasi data Rekap Jumlah Dosen...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetRekapJumlahDosen', $params);

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
                RekapJumlahDosen::updateOrCreate(
                    ['id_prodi' => $item['id_prodi']],
                    [
                        'id_periode' => $item['id_periode'],
                        'nama_periode' => $item['nama_periode'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'jumlah_dosen_homebase' => $item['jumlah_dosen_homebase'],
                        'is_homebase' => $item['is_homebase'],
                    ]
                );

                $this->info("Data ID Prodi {$item['id_prodi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID Prodi {$item['id_prodi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
