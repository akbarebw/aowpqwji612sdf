<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Prodi;
use App\Models\ListSkalaNilaiProdi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class ListSkalaNilaiProdiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-skala-nilai-prodi-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data List Skala Nilai Prodi dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data List Skala Nilai Prodi...");

        $apiRequest = new ApiRequest();

        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];
    
        $response = $apiRequest->sendRequest('GetListSkalaNilaiProdi', $params);

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
                    
                    ListSkalaNilaiProdi::updateOrCreate(
                        ['id_bobot_nilai' => $item['id_bobot_nilai']],
                        [
                            'tgl_create' => $item['tgl_create'],
                            'id_prodi' => $item['id_prodi'],
                            'nama_program_studi' => $item['nama_program_studi'],
                            'nilai_huruf' => $item['nilai_huruf'],
                            'nilai_indeks' => $item['nilai_indeks'],
                            'bobot_minimum' => $item['bobot_minimum'],
                            'bobot_maksimum' => $item['bobot_maksimum'],
                            'tanggal_mulai_efektif' => Carbon::parse($item['tanggal_mulai_efektif'])->format('Y-m-d H:i:s'),
                            'tanggal_akhir_efektif' => Carbon::parse($item['tanggal_akhir_efektif'])->format('Y-m-d H:i:s'),
                            'status_sync' => $item['status_sync']
                        ]
                    );
                    $this->info("Data Perhitungan  Prodi {$item['id_bobot_nilai']} berhasil disinkronkan.");
                } catch (\Exception $e) {
                    $this->error("Gagal sinkronkan data Prodi ID {$item['id_bobot_nilai']}: " . $e->getMessage());
                }
            }
        

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
