<?php

namespace App\Console\Commands\Refrens;

use Carbon\Carbon;
use App\Models\TahunAjaran;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class TahunAjarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tahun-ajar-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Tahun Ajar dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Tahun Ajar...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetTahunAjaran', $params);

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
                $tanggal_mulai = Carbon::parse($item['tanggal_mulai'])->toDateTimeString();
                $tanggal_selesai = Carbon::parse($item['tanggal_selesai'])->toDateTimeString(); 

                TahunAjaran::updateOrCreate(
                    ['id_tahun_ajaran' => $item['id_tahun_ajaran']],
                    [
                        'nama_tahun_ajaran' => $item['nama_tahun_ajaran'],
                        'a_periode_aktif' => $item['a_periode_aktif'],
                        'tanggal_mulai' => $tanggal_mulai,
                        'tanggal_selesai' => $tanggal_selesai
                    ]
                );

                $this->info("Data Tahun Ajar ID {$item['id_tahun_ajaran']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_tahun_ajaran']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}