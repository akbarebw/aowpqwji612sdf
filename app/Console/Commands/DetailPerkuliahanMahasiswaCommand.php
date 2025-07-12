<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\DetailPerkuliahanMahasiswa;

class DetailPerkuliahanMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:detail-perkuliahan-mahasiswa-command';

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
        $this->info("Memulai sinkronisasi data Detail Prkuliahan Mahasiswa..");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetDetailPerkuliahanMahasiswa', $params);



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
                DetailPerkuliahanMahasiswa::updateOrCreate(
                    ['id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa']],
                    [
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'angkatan' => $item['angkatan'],
                        'id_semester' => $item['id_semester'],
                        'nim' => $item['nim'],
                        'nama_mahasiswa' => $item['nama_mahasiswa'],
                        'nama_semester' => $item['nama_semester'],
                        'id_status_mahasiswa' => $item['id_status_mahasiswa'],
                        'nama_status_mahasiswa' => $item['nama_status_mahasiswa'],
                        'ips' => $item['ips'],
                        'ipk' => $item['ipk'],
                        'sks_semester' => $item['sks_semester'],
                        'sks_total' => $item['sks_total'],
                        'status_sync' => $item['status_sync'],
                        

                    ]
                );

                $this->info("Data Detail Perkuliahan Mahasiswa ID {$item['id_registrasi_mahasiswa']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_registrasi_mahasiswa']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
