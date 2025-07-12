<?php

namespace App\Console\Commands;

use App\Models\BiodataDosen;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;

class BiodataDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:biodata-dosen-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Biodata Dosen dari API ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai sinkronisasi data biodata dosen...");
        $apiRequest = new ApiRequest();
        $params = [
            'filter' => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];
        $response = $apiRequest->sendRequest('DetailBiodataDosen', $params);
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
             BiodataDosen::updateOrCreate(
              ['id_dosen' => $item['id_dosen'] ?? ''],
                [
                    'id_dosen' => $item['id_dosen'],
                    'nama_dosen' => $item['nama_dosen'] ,
                    'tempat_lahir' => $item['tempat_lahir'],
                    'tanggal_lahir' => $item['tanggal_lahir'],
                    'jenis_kelamin' => $item['jenis_kelamin'],
                    'id_agama' => $item['id_agama'],
                    'nama_agama' => $item['nama_agama'],
                    'id_status_aktif' => $item['id_status_aktif'],
                    'nama_status_aktif' => $item['nama_status_aktif'],
                    'nidn' => $item['nidn'],
                    'nama_ibu_kandung' => $item['nama_ibu_kandung'],
                    'nik' => $item['nik'],
                    'nip' => $item['nip'] ,
                    'npwp' => $item['npwp'],
                    'id_jenis_sdm' => $item['id_jenis_sdm'],
                    'nama_jenis_sdm' => $item['nama_jenis_sdm'],
                    'no_sk_cpns' => $item['no_sk_cpns'],
                    'tanggal_sk_cpns' => Carbon::parse($item['tanggal_sk_cpns'])->format('Y-m-d'),
                    'no_sk_pengangkatan' => $item['no_sk_pengangkatan'],
                    'mulai_sk_pengangkatan' => Carbon::parse($item['mulai_sk_pengangkatan'])->format('Y-m-d'),
                    'id_lembaga_angkat' => $item['id_lembaga_pengangkatan'],
                    'nama_lembaga_pengangkatan' => $item['nama_lembaga_pengangkatan'],
                    'id_pangkat_golongan' => $item['id_pangkat_golongan'],
                    'nama_pangkat_golongan' => $item['nama_pangkat_golongan'],
                    'id_sumber_gaji' => $item['id_sumber_gaji'],
                    'nama_sumber_gaji' => $item['nama_sumber_gaji'],
                    'jalan' => $item['jalan'],
                    'dusun' => $item['dusun'],
                    'rt' => $item['rt'],
                    'rw' => $item['rw'],
                    'ds_kel' => $item['ds_kel'],
                    'kode_pos' => $item['kode_pos'],
                    'id_wilayah' => $item['id_wilayah'],
                    'nama_wilayah' => $item['nama_wilayah'],
                    'telepon' => $item['telepon'],
                    'handphone' => $item['handphone'],
                    'email' => $item['email'],
                    'status_pernikahan' => $item['status_pernikahan'],
                    'nama_suami_istri' => $item['nama_suami_istri'],
                    'nip_suami_istri' => $item['nip_suami_istri'],
                    'tanggal_mulai_pns' => Carbon::parse($item['tanggal_mulai_pns'])->format('Y-m-d'),
                    'id_pekerjaan_suami_istri' => $item['id_pekerjaan_suami_istri'],
                    'nama_pekerjaan_suami_istri' => $item['nama_pekerjaan_suami_istri'],
                ]
            );
                $this->info("Data BiodataDosen ID {$item['id_dosen']} berhasil disinkronkan.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan data BiodataDosen ID {$item['id_dosen']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;

    }
}
