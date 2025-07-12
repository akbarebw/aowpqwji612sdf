<?php

namespace App\Console\Commands;

use App\Models\RiwayatPangkatDosen;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use Carbon\Carbon;


class RiwayatPangkatDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:riwayat-pangkat-dosen-command';

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
        $this->info("Memulai sinkronisasi data Riwayat Pangkat Dosen...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetRiwayatPangkatDosen', $params);

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

            
                $pangkat = \DB::table('pangkat_golongan')
                    ->where('nama_pangkat', $item['nama_pangkat_golongan'])
                    ->first();
    
                if (!$pangkat) {
                    $this->warn("Pangkat '{$item['nama_pangkat_golongan']}' tidak ditemukan di tabel jabatan_fungsional.");
                    continue; 
                }

            try {
                RiwayatPangkatDosen::updateOrCreate(
                    [
                        'id_dosen' => $item['id_dosen'],
                        'nidn' => $item['nidn'],
                        'nama_dosen' => $item['nama_dosen'],
                        'id_pangkat_golongan' => $pangkat->id_pangkat_golongan,
                        'nama_pangkat_golongan' => $item['nama_pangkat_golongan'],
                        'sk_pangkat' => $item['sk_pangkat'],
                        'tanggal_sk_pangkat' => Carbon::parse($item['tanggal_sk_pangkat'])->format('Y-m-d H:i:s'),
                        'mulai_sk_pangkat' => Carbon::parse($item['mulai_sk_pangkat'])->format('Y-m-d H:i:s'),
                        'masa_kerja_dalam_tahun' => $item['masa_kerja_dalam_tahun'],
                        'masa_kerja_dalam_bulan' => $item['masa_kerja_dalam_bulan'],

                    ]
                );

                $this->info("Data Riwayat Pangkat Dosen ID {$item['id_dosen']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_dosen']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
