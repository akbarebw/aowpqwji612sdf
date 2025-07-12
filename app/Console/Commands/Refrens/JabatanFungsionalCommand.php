<?php

namespace App\Console\Commands\Refrens;

use App\Models\JabatanFungsional;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class JabatanFungsionalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jabatan-fungsional-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Jabatan Fungsional dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Jabatan Fungsional...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetJabfung', $params);

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
                JabatanFungsional::updateOrCreate(
                    [
                        'id_jabatan_fungsional' => $item['id_jabatan_fungsional'],
                        'nama_jabatan_fungsional' => $item['nama_jabatan_fungsional'],
                    ]
                );

                $this->info("Data Jabatan Fungsional ID {$item['nama_jabatan_fungsional']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['nama_jabatan_fungsional']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
