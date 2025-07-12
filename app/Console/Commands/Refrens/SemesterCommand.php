<?php

namespace App\Console\Commands\Refrens;

use App\Models\Semester;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use Carbon\Carbon;

class SemesterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:semester-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Semester dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Semester...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetSemester', $params);

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
                Semester::updateOrCreate(
                    [
                        'id_semester' => $item['id_semester'],
                        'id_tahun_ajaran' => $item['id_tahun_ajaran'] ?? null,
                        'nama_semester' => $item['nama_semester'],
                        'semester' => $item['semester'],
                        'a_periode_aktif' => $item['a_periode_aktif'],
                        'tanggal_mulai' => Carbon::parse($item['tanggal_mulai'])->format('Y-m-d H:i:s'),
                        'tanggal_selesai' => Carbon::parse($item['tanggal_selesai'])->format('Y-m-d H:i:s'),

                    ]
                );

                $this->info("Data Semester ID {$item['id_semester']} berhasil disinkronkan.");
            } catch (\Exception $e) {

                $this->error("Gagal menyinkronkan data untuk ID {$item['id_tahun_ajaran']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
