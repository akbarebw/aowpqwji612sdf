<?php

namespace App\Console\Commands;

use App\Models\Prodi;
use Illuminate\Console\Command;
use App\Services\Api\ApiRequest;
use App\Models\AktivitasMengajarDosen;

class AktivitasMengajarDosenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:aktivitas-mengajar-dosen-command';

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
        $apiRequest = new ApiRequest();

        $prodi = Prodi::all();

        $params = [
            "filter" => "",
            'order' => '',
            'limit' => "",
            'offset' => "",
        ];

        $response = $apiRequest->sendRequest('GetAktivitasMengajarDosen', $params);

        // token expired
        if($response['error_code'] == 100) {
            $this->error("Token expired.");
            return;
        }

        $data = $response['data'] ?? [];

        foreach ($data as $item) {
            try {
                AktivitasMengajarDosen::updateOrCreate(
                    ['id_registrasi_dosen' => $item['id_registrasi_dosen']],
                    [
                        'id_dosen' => $item['id_dosen'] ?? '',
                        'nama_dosen' => $item['nama_dosen'] ?? '',
                        'id_periode' => $item['id_periode'] ?? '',
                        'nama_periode' => $item['nama_periode'] ?? '',
                        'id_prodi' => $item['id_prodi'] ?? '',
                        'nama_program_studi' => $item['nama_program_studi'] ?? '',
                        'id_matkul' => $item['id_matkul'] ?? '',
                        'nama_mata_kuliah' => $item['nama_mata_kuliah'] ?? '',
                        'id_kelas' => $item['id_kelas'] ?? '',
                        'nama_kelas_kuliah' => $item['nama_kelas_kuliah'] ?? '',
                        'rencana_minggu_pertemuan' => $item['rencana_minggu_pertemuan'] ?? NULL,
                        'realisasi_minggu_pertemuan' => $item['realisasi_minggu_pertemuan'] ?? NULL,
                    ]
                );

                $this->info("Sinkronkan Data ID {$item['id_registrasi_dosen']} berhasil.");
            } catch (\Exception $e) {
                $this->error("Gagal sinkronkan Data ID {$item['id_registrasi_dosen']}: " . $e->getMessage());
                break;
            }
        }

        $this->info("Sinkronisasi selesai.");
        return Command::SUCCESS;


    }

}
