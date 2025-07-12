<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Dosen;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class DosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dosen-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Dosen dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data dosen...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetListDosen', $params);
        // Cek error dari response
        if (isset($response['error'])) {
            $this->error("Terjadi kesalahan saat mengakses API: " . $response['error']);
            return Command::FAILURE; // Mengembalikan error status
        }

        // Ambil data jika tidak ada error
        $data = $response['data'] ?? [];
        if (empty($data)) {
            $this->warn("Tidak ada data baru yang perlu disinkronkan.");
            return Command::SUCCESS;
        }
        foreach ($data as $item) {
            try {
                Dosen::updateOrCreate(
                    ['id_dosen' => $item['id_dosen']],
                    [
                        'nama_dosen' => $item['nama_dosen'],
                        'nidn' => $item['nidn'],
                        'nip' => $item['nip'],
                        'jenis_kelamin' => $item['jenis_kelamin'],
                        'id_agama' => $item['id_agama'],
                        'nama_agama' => $item['nama_agama'],
                        'tanggal_lahir' => Carbon::createFromFormat('d-m-Y', $item['tanggal_lahir'])->format('Y-m-d'),
                        'id_status_aktif' => $item['id_status_aktif'],
                        'nama_status_aktif' => $item['nama_status_aktif'],

                    ]
                );
                $this->info("Data Dosen ID {$item['id_dosen']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data dosen ID {$item['id_dosen']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
