<?php

namespace App\Console\Commands\Refrens;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\StatusKeaktifanPegawai;

class StatusKeaktifanPegawaiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:status-keaktifan-pegawai-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Status Keaktifan Pegawai dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Status Keaktifan Pegawai...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetStatusKeaktifanPegawai', $params);

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
                StatusKeaktifanPegawai::updateOrCreate(
                    [
                        'id_status_aktif' => $item['id_status_aktif'],
                        'nama_status_aktif' => $item['nama_status_aktif']
                    ]
                );

                $this->info("Data Status Keaktifan Pegawai ID {$item['id_status_aktif']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_status_aktif']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
