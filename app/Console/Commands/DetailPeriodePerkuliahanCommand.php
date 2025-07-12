<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\DetailPeriodePerkuliahan;


class DetailPeriodePerkuliahanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:detail-periode-perkuliahan-command';

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
        $this->info("Memulai sinkronisasi data Detail Periode Perkuliahan...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetDetailPeriodePerkuliahan', $params);



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
                DetailPeriodePerkuliahan::updateOrCreate(
                    [
                        'id_prodi' => $item['id_prodi'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'id_semester' => $item['id_semester'],
                        'nama_semester' => $item['nama_semester'],
                        'jumlah_target_mahasiswa_baru' => $item['jumlah_target_mahasiswa_baru'],
                        'jumlah_pendaftar_ikut_seleksi' => $item['jumlah_pendaftar_ikut_seleksi'],
                        'jumlah_pendaftar_lulus_seleksi' => $item['jumlah_pendaftar_lulus_seleksi'],
                        'jumlah_daftar_ulang' => $item['jumlah_daftar_ulang'],
                        'jumlah_mengundurkan_diri' => $item['jumlah_mengundurkan_diri'],
                        'tanggal_awal_perkuliahan' => \Carbon\Carbon::parse($item['tanggal_awal_perkuliahan'])->format('Y-m-d'),
                        'tanggal_akhir_perkuliahan' => \Carbon\Carbon::parse($item['tanggal_akhir_perkuliahan'])->format('Y-m-d'),
                        'jumlah_minggu_pertemuan' => $item['jumlah_minggu_pertemuan'],
                        'status_sync' => $item['status_sync'],
                        

                    ]
                );

                $this->info("Data Detail Periode Perkuliahan ID {$item['id_prodi']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal menyinkronkan data untuk ID {$item['id_prodi']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}

