<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\ExportDataMahasiswaLulus;

class ExportDataMahasiswaLulusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-mahasiswa-lulus-command';

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
        //
        $this->info("Memulai sinkronisasi eksport data mahasiswa lulus...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];
        $response = $apiRequest->sendRequest('ExportDataMahasiswaLulus', $params);
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
                ExportDataMahasiswaLulus::updateOrCreate(
                    ['id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa']],
                    [
                        'nim' => $item['nim'],
                        'nama_mahasiswa' => $item['nama_mahasiswa'] ?? '',
                        'jenis_kelamin' => $item['jenis_kelamin'] ?? '',
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'id_periode' => $item['id_periode'],
                        'nama_periode_masuk' => $item['nama_periode_masuk'],
                        'id_jenis_keluar' => $item['id_jenis_keluar'],
                        'nama_jenis_keluar' => $item['nama_jenis_keluar'],
                        'nomor_ijazah' => $item['nomor_ijazah'],
                        'tanggal_keluar' => $item['tanggal_keluar'],
                        'keterangan' => $item['keterangan'],
                        'status_sync' => $item['status_sync'],
                    ]

                );
                $this->info("Data Export Data Mahasiswa Lulus ID {$item['id_registrasi_mahasiswa']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data mahasiswa  ID {$item['id_registrasi_mahasiswa']}: " . $e->getMessage());
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}