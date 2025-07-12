<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BiodataMahasiswa;
use App\Services\Api\ApiRequest;

class BiodataMahasiswaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:biodata-mahasiswa-command';

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
            $this->info("Memulai sinkronisasi data BiodataMahasiswa...");
            $apiRequest = new ApiRequest();
            $params = [
                'filter' => "",
                'order' => '',
                'limit' => "",
                'offset' => "",
            ];
            $response = $apiRequest->sendRequest('GetBiodataMahasiswa', $params);
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
                // dd($item);
                try {
                    BiodataMahasiswa::updateOrCreate(
                        ['id_mahasiswa' => $item['id_mahasiswa']],
                        [
                            'nama_mahasiswa' => $item['nama_mahasiswa'],
                            'jenis_kelamin' => $item['jenis_kelamin'],
                            'tempat_lahir' => $item['tempat_lahir'],
                            'tanggal_lahir' => $item['tanggal_lahir'],
                            'id_agama' => $item['id_agama'],
                            'nama_agama' => $item['nama_agama'],
                            'nik' => $item['nik'],
                            'nisn' => $item['nisn'],
                            'npwp' => $item['npwp'],
                            'id_negara' => $item['id_negara'],
                            'kewarganegaraan' => $item['kewarganegaraan'],
                            'jalan' => $item['jalan'],
                            'dusun' => $item['dusun'],
                            'rt' => $item['rt'],
                            'rw' => $item['rw'],
                            'kelurahan'=> $item['kelurahan'],
                            'kode_pos' => $item['kode_pos'],
                            'id_wilayah' => $item['id_wilayah'],
                            'nama_wilayah'=> $item['nama_wilayah'],
                            'id_jenis_tinggal' => $item['id_jenis_tinggal'],
                            'nama_jenis_tinggal' => $item['nama_jenis_tinggal'],
                            'id_alat_transportasi' => $item['id_alat_transportasi'],
                            'nama_alat_transportasi' => $item['nama_alat_transportasi'],
                            'telepon' => $item['telepon'],
                            'handphone' => $item['handphone'],
                            'email' => $item['email'],
                            'penerima_kps' => $item['penerima_kps'],
                            'nomor_kps' => $item['nomor_kps'],
                            'nik_ayah' => $item['nik_ayah'],
                            'nama_ayah' => $item['nama_ayah'],
                            'tanggal_lahir_ayah' => $item['tanggal_lahir_ayah'],
                            'id_pendidikan_ayah' => $item['id_pendidikan_ayah'],
                            'nama_pendidikan_ayah' => $item['nama_pendidikan_ayah'],
                            'id_pekerjaan_ayah' => $item['id_pekerjaan_ayah'],
                            'nama_pekerjaan_ayah' => $item['nama_pekerjaan_ayah'],
                            'id_penghasilan_ayah' => $item['id_penghasilan_ayah'],
                            'nama_penghasilan_ayah' => $item['nama_penghasilan_ayah'],
                            'nik_ibu' => $item['nik_ibu'],
                            'nama_ibu_kandung' => $item['nama_ibu_kandung'],
                            'tanggal_lahir_ibu' => $item['tanggal_lahir_ibu'],
                            'id_pendidikan_ibu' => $item['id_pendidikan_ibu'],
                            'nama_pendidikan_ibu' => $item['nama_pendidikan_ibu'],
                            'id_pekerjaan_ibu' => $item['id_pekerjaan_ibu'],
                            'nama_pekerjaan_ibu' => $item['nama_pekerjaan_ibu'],
                            'id_penghasilan_ibu' => $item['id_penghasilan_ibu'],
                            'nama_penghasilan_ibu' => $item['nama_penghasilan_ibu'],
                            'nama_wali' => $item['nama_wali'],
                            'tanggal_lahir_wali' => $item['tanggal_lahir_wali'],
                            'id_pendidikan_wali' => $item['id_pendidikan_wali'],
                            'nama_pendidikan_wali' => $item['nama_pendidikan_wali'],
                            'id_pekerjaan_wali' => $item['id_pekerjaan_wali'],
                            'nama_pekerjaan_wali' => $item['nama_pekerjaan_wali'],
                            'id_penghasilan_wali' => $item['id_penghasilan_wali'],
                            'nama_penghasilan_wali' => $item['nama_penghasilan_wali'],
                            'id_kebutuhan_khusus_mahasiswa' => $item['id_kebutuhan_khusus_mahasiswa'],
                            'nama_kebutuhan_khusus_mahasiswa' => $item['nama_kebutuhan_khusus_mahasiswa'],
                            'id_kebutuhan_khusus_ayah' => $item['id_kebutuhan_khusus_ayah'],
                            'nama_kebutuhan_khusus_ayah' => $item['nama_kebutuhan_khusus_ayah'],
                            'id_kebutuhan_khusus_ibu' => $item['id_kebutuhan_khusus_ibu'],
                            'nama_kebutuhan_khusus_ibu' => $item['nama_kebutuhan_khusus_ibu'],

                        ]
                    );
                    $this->info("Data BiodataMahasiswa ID {$item['id_mahasiswa']} berhasil disinkronkan.");
                } catch (\Exception $e) {
                    $this->error("Gagal menyinkronkan data untuk ID {$item['id_mahasiswa']}: " . $e->getMessage());
                }
            }
            $this->info("Sinkronisasi selesai.");
            return Command::SUCCESS;
        }
}
