<?php

namespace App\Console\Commands\Refrens;

use App\Models\DataTerhapus;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class DataTerhapusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:data-terhapus-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi Data Terhapus dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Terhspus...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetDataTerhapus', $params);

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

                DataTerhapus::updateOrCreate(
                    ['id_mahasiswa' => $item['id_mahasiswa']],
                    [
                        'nama_mahasiswa' => $item['nama_mahasiswa'],
                        'jenis_kelamin' => $item['jenis_kelamin'],
                        'tempat_lahir' => $item['tempat_lahir'],
                        'tanggal_lahir' => Carbon::parse($item['tanggal_lahir'])->format('Y-m-d H:i:s'),
                        'nama_ibu_kandung' => $item['nama_ibu_kandung'],
                        'agama' => $item['agama'],
                        'id_agama' => $item['id_agama']
                    ]
                );

                $this->info("Data Terhapus ID {$item['id_mahasiswa']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_mahasiswa']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
