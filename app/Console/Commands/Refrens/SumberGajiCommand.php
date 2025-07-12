<?php

namespace App\Console\Commands\Refrens;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class SumberGajiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sumber-gaji-command';

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
        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];


        $this->info("Memulai sinkronisasi data Sumber Gaji...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetSumberGaji', $params);

        dd($response);

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
                TingkatPrestasi::updateOrCreate(
                    ['id_tingkat_prestasi' => $item['id_tingkat_prestasi']],
                    [
                        'nama_tingkat_prestasi' => $item['nama_tingkat_prestasi']
                    ]
                );

                $this->info("Data Tingkat Prestasi ID {$item['id_tingkat_prestasi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_tingkat_prestasi']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;

    }
}
