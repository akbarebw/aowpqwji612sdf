<?php

namespace App\Console\Commands\Refrens;

use App\Models\JenisPendaftaran;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class JenisPendaftaranCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jenis-pendaftaran-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jenis Pendaftaran dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jenis Pendaftaran...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJenisPendaftaran', $params);

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
                JenisPendaftaran::updateOrCreate(
                    ['id_jenis_daftar' => $item['id_jenis_daftar']],
                    [
                        'nama_jenis_daftar' => $item['nama_jenis_daftar'],
                        'untuk_daftar_sekolah' => $item['untuk_daftar_sekolah']
                    ]
                );

                $this->info("Data Jenis Pendaftaran ID {$item['id_jenis_daftar']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk Jenis Pendaftaran ID {$item['id_jenis_daftar']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
