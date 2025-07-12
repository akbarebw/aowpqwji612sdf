<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\RiwayatFungsionalDosen;

class RiwayatFungsionalDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:riwayat-fungsional-dosen-command';

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
        $this->info("Memulai sinkronisasi data Riwayat Fungsional Dosen...");
    
        $apiRequest = new ApiRequest();
    
        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];
    
        $response = $apiRequest->sendRequest('GetRiwayatFungsionalDosen', $params);
    
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
                RiwayatFungsionalDosen::updateOrCreate(
                    ['id_dosen' => $item['id_dosen']],
                    [
                        'nidn' => $item['nidn'],
                        'nama_dosen' => $item['nama_dosen'],
                        'id_jabatan_fungsional' => $item['id_jabatan_fungsional'],
                        'nama_jabatan_fungsional' => $item['nama_jabatan_fungsional'],
                        'sk_jabatan_fungsional' => $item['sk_jabatan_fungsional'],
                        'mulai_sk_jabatan' => Carbon::parse($item['mulai_sk_jabatan'])->format('Y-m-d H:i:s'),
                    ]
                );
    
                $this->info("Data Riwayat Fungsional Dosen ID {$item['id_dosen']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_dosen']}: " . $e->getMessage());
            }
        }
    
        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
