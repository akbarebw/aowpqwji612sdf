<?php

namespace App\Console\Commands;

use App\Models\Prodi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\DetailNilaiPerkuliahan;

class DetailNilaiPerkuliahanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:detail-nilai-perkuliahan-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Detail Nilai Perkuliahan dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data Detail Nilai Perkuliahan...");

        $apiRequest = new ApiRequest();
        
        $prodiList = Prodi::all();

        foreach ($prodiList as $prod) {
            $id_prodi = $prod->id_prodi;
            $params = [
                "filter" => "id_prodi='$id_prodi'",
                'order' => '',
                'limit' => '',
                'offset' => '',
            ];
    
            $response = $apiRequest->sendRequest('GetDetailNilaiPerkuliahanKelas', $params);
    
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
                    DetailNilaiPerkuliahan::updateOrCreate(
                        ['id_prodi' => $item['id_prodi']],
                        [
                            'nama_program_studi' => $item['nama_program_studi'],
                            'id_semester' => $item['id_semester'],
                            'nama_semester' => $item['nama_semester'],
                            'id_matkul' => $item['id_matkul'],
                            'kode_mata_kuliah' => $item['kode_mata_kuliah'],
                            'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                            'sks_mata_kuliah' => $item['sks_mata_kuliah'],
                            'id_kelas_kuliah' => $item['id_kelas_kuliah'],
                            'nama_kelas_kuliah' => $item['nama_kelas_kuliah'],
                            'id_registrasi_mahasiswa' => $item['id_registrasi_mahasiswa'],
                            'id_mahasiswa' => $item['id_mahasiswa'],
                            'nim' => $item['nim'],
                            'nama_mahasiswa' => $item['nama_mahasiswa'],
                            'jurusan' => $item['jurusan'],
                            'angkatan' => $item['angkatan'],
                            'nilai_angka' => $item['nilai_angka'],
                            'nilai_indeks' => $item['nilai_indeks'],
                            'nilai_huruf' => $item['nilai_huruf']
                        ]
                    );
                    $this->info("Data Detial Nilai Perkuliahan ID {$item['id_prodi']} berhasil disinkronkan.");
                } catch (\Exception $e) {
                    $this->error("Gagal sinkronkan data Detial Nilai Perkuliahan ID {$item['id_prodi']}: " . $e->getMessage());
                }
            }
        }
        

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;
    }
}
