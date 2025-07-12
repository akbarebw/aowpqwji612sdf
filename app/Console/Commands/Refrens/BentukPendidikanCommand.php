<?php

namespace App\Console\Commands\Refrens;

use Illuminate\Console\Command;
use App\Models\BentukPendidikan;
use App\Services\Api\ApiRequest;

class BentukPendidikanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:bentuk-pendidikan-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi Bentuk Pendidikan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Sinkronisasi data Bentuk Pendidikan...');
        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetBentukPendidikan', $params);

        // Log error jika terjadi kesalahan saat memanggil API
        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat memanggil API: " . $response['error']);
            return Command::FAILURE;
        }

        // Ambil data dari response
        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data yang ditemukan untuk disinkronkan.");
            return Command::SUCCESS;
        }

        foreach ($data as $item) {
            try {
                BentukPendidikan::updateOrCreate(
                    [
                        'id_bentuk_pendidikan' => $item['id_bentuk_pendidikan'],
                        'nama_bentuk_pendidikan' => $item['nama_bentuk_pendidikan'],
                    ]
                );

                $this->info("Data bentuk pendidikan ID {$item['id_bentuk_pendidikan']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data Bentuk Pendidikan ID {$item['id_bentuk_pendidikan']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");

        return Command::SUCCESS;
    }
}
