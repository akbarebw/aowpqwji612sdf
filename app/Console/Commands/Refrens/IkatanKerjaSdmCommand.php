<?php

namespace App\Console\Commands\Refrens;

use App\Models\IkatanKerjaSdm;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class IkatanKerjaSdmCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ikatan-kerja-sdm-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Ikatan Kerja SDM dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Ikatan Kerja SDM...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetIkatanKerjaSdm', $params);

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
                IkatanKerjaSdm::updateOrCreate(
                    ['id_ikatan_kerja' => $item['id_ikatan_kerja']],
                    [
                        'nama_ikatan_kerja' => $item['nama_ikatan_kerja'],
                    ]
                );

                $this->info("Data Ikatan Kerja SDM ID {$item['id_ikatan_kerja']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_ikatan_kerja']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
