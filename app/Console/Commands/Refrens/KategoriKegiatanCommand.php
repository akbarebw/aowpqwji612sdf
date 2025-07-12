<?php

namespace App\Console\Commands\Refrens;

use Illuminate\Console\Command;
use App\Models\KategoriKegiatan;
use App\Services\Api\ApiRequest;

class KategoriKegiatanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kategori-kegiatan-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Kategori Kegiatan dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Kategori Kegiatan...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetKategoriKegiatan', $params);

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
               KategoriKegiatan::updateOrCreate(
                    ['id_kategori_kegiatan' => $item['id_kategori_kegiatan']],
                    [
                        'nama_kategori_kegiatan' => $item['nama_kategori_kegiatan'],
                    ]
                );

                $this->info("Data Kategori Kegiatan ID {$item['id_kategori_kegiatan']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_kategori_kegiatan']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
