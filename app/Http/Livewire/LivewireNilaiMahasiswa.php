<?php

namespace App\Http\Livewire;

use App\Models\Prodi;
use Livewire\Component;
use App\Models\Semester;
use App\Models\ListMataKuliah;
use App\Models\PengaturanKomponen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\DosenPengajarKelasKuliah;
use App\Models\BobotKomponenKelasDosen;
use App\Models\DetailNilaiPerkuliahan;
use Illuminate\Support\Facades\Log;
use App\Models\KelasKuliah;
use App\Models\KrsMahasiswa;
use App\Models\Nilai;

use App\Models\Mahasiswa;
use App\Models\NilaiKomponenPerkuliahan;

class LivewireNilaiMahasiswa extends Component
{
    public $semester_terpilih;
    public $prodi_terpilih;
    public $matkul_terpilih;
    public $kelas_terpilih;

    public $daftar_semester = [];
    public $daftar_prodi = [];
    public $daftar_matkul = [];
    public $daftar_kelas = [];
    public $daftar_mahasiswa = [];
    public $pengaturan_komponen = null;

    public $editBobotId = null;
    public $editBobotValue = null;
    public $editBobotNama = null;

    public $successMessage = null;
    public $bobotError = null;
    public $maxNilaiError = [];

    public $inputNilai = [];
    public $nilaiAkhir = [];
    public $nilaiHuruf = [];
    public $ikutUas = [];
    public $nilaiPerkuliahanDb = [];
    public array $daftarMahasiswa = [];
    public $keterangan = [];

    public function mount()
    {
        $this->ambilSemester();

        if ($this->daftar_semester) {
            $this->semester_terpilih = $this->daftar_semester->first()->id_semester;
            $this->ambilProdi();

            if ($this->daftar_prodi) {
                $this->prodi_terpilih = $this->daftar_prodi->first()->id_prodi;
                $this->ambilMatkul();

                if ($this->daftar_matkul) {
                    $this->matkul_terpilih = $this->daftar_matkul->first()->id_matkul;
                    $this->ambilKelas();

                    if ($this->daftar_kelas) {
                        $this->kelas_terpilih = $this->daftar_kelas->first()->id_kelas_kuliah;
                        $this->ambilPeserta();
                    }
                }
            }
        }
    }

    public function updatedSemesterTerpilih()
    {
        $this->reset(['prodi_terpilih', 'matkul_terpilih', 'kelas_terpilih']);
        $this->resetDaftar();
        $this->ambilProdi();

        if ($this->daftar_prodi) {
            $this->prodi_terpilih = $this->daftar_prodi->first()->id_prodi;
            $this->updatedProdiTerpilih();
        }
    }

    public function updatedProdiTerpilih()
    {
        $this->reset(['matkul_terpilih', 'kelas_terpilih']);
        $this->resetDaftar(['daftar_matkul', 'daftar_kelas', 'daftar_mahasiswa']);
        $this->ambilMatkul();

        if ($this->daftar_matkul) {
            $this->matkul_terpilih = $this->daftar_matkul->first()->id_matkul;
            $this->updatedMatkulTerpilih();
        }
    }

    public function updatedMatkulTerpilih()
    {
        $this->reset(['kelas_terpilih']);
        $this->resetDaftar(['daftar_kelas', 'daftar_mahasiswa']);
        $this->ambilKelas();

        if ($this->daftar_kelas) {
            $this->kelas_terpilih = $this->daftar_kelas->first()->id_kelas_kuliah;
            $this->updatedKelasTerpilih();
        }
    }

    public function updatedKelasTerpilih()
    {
        $this->ambilPeserta();
    }

    protected function resetDaftar($fields = ['daftar_prodi', 'daftar_matkul', 'daftar_kelas', 'daftar_mahasiswa'])
    {
        foreach ($fields as $field) {
            $this->{$field} = [];
        }
    }

    public function ambilSemester()
    {
        $dosen = Auth::user()->dosen;
        if (!$dosen) return;

        $this->daftar_semester = Semester::whereIn('id_semester', function ($q) use ($dosen) {
            $q->select('id_semester')
                ->from('dosen_pengajar_kelas_kuliah')
                ->where('id_dosen', $dosen->id_dosen);
        })
            ->orderByDesc('tanggal_mulai')
            ->get();
    }

    public function ambilProdi()
    {
        $dosen = Auth::user()->dosen;
        if (!$dosen || !$this->semester_terpilih) return;

        $this->daftar_prodi = Prodi::whereIn('id_prodi', function ($q) use ($dosen) {
            $q->select('id_prodi')
                ->from('dosen_pengajar_kelas_kuliah')
                ->where('id_dosen', $dosen->id_dosen)
                ->where('id_semester', $this->semester_terpilih);
        })->orderBy('nama_program_studi')->get();
    }

    public function ambilMatkul()
    {
        $dosen = Auth::user()->dosen;
        if (!$dosen || !$this->semester_terpilih || !$this->prodi_terpilih) return;

        $kelas_ids = DosenPengajarKelasKuliah::where('id_dosen', $dosen->id_dosen)
            ->where('id_semester', $this->semester_terpilih)
            ->where('id_prodi', $this->prodi_terpilih)
            ->pluck('id_kelas_kuliah');

        $this->daftar_matkul = DB::table('kelas_kuliah as kk')
            ->join('mata_kuliah as mk', 'kk.id_matkul', '=', 'mk.id_matkul')
            ->whereIn('kk.id_kelas_kuliah', $kelas_ids)
            ->select('mk.id_matkul', 'mk.nama_mata_kuliah')
            ->distinct()
            ->orderBy('mk.nama_mata_kuliah')
            ->get();
    }

    public function ambilKelas()
    {
        $dosen = Auth::user()->dosen;
        if (!$dosen || !$this->semester_terpilih || !$this->prodi_terpilih || !$this->matkul_terpilih) return;

        $this->daftar_kelas = DB::table('kelas_kuliah as kk')
            ->join('dosen_pengajar_kelas_kuliah as dpkk', 'kk.id_kelas_kuliah', '=', 'dpkk.id_kelas_kuliah')
            ->where([
                ['dpkk.id_dosen', '=', $dosen->id_dosen],
                ['dpkk.id_semester', '=', $this->semester_terpilih],
                ['dpkk.id_prodi', '=', $this->prodi_terpilih],
                ['kk.id_matkul', '=', $this->matkul_terpilih]
            ])
            ->select('kk.id_kelas_kuliah', 'kk.nama_kelas_kuliah')
            ->orderBy('kk.nama_kelas_kuliah')
            ->get();
    }

    // public function ambilPeserta()
    // {
    //     if (!$this->semester_terpilih || !$this->kelas_terpilih) {
    //         $this->daftar_mahasiswa = [];
    //         return;
    //     }

    //     $this->daftar_mahasiswa = DB::table('krs_mahasiswa as krs')
    //         ->join('kelas_kuliah as kk', 'krs.id_kelas', '=', 'kk.id_kelas_kuliah')
    //         ->join('prodi as p', 'krs.id_prodi', '=', 'p.id_prodi')
    //         ->join('mata_kuliah as mk', 'krs.id_matkul', '=', 'mk.id_matkul')
    //         ->where('krs.id_kelas', $this->kelas_terpilih)
    //         ->select('krs.nim', 'krs.nama_mahasiswa', 'kk.nama_kelas_kuliah', 'mk.nama_mata_kuliah', 'p.nama_program_studi')
    //         ->orderBy('krs.nim')
    //         ->get();
    //     foreach ($this->daftar_mahasiswa as $mhs) {
    //         $this->ikutUas[$mhs->nim] = $this->ikutUas[$mhs->nim] ?? 1;
    //     }

    //     $this->generatePengaturanKomponen();
    // }
    public function ambilPeserta()
    {
        if (!$this->semester_terpilih || !$this->kelas_terpilih) {
            $this->daftar_mahasiswa = [];
            return;
        }

        // Ambil daftar mahasiswa dari KRS
        $this->daftar_mahasiswa = DB::table('krs_mahasiswa as krs')
            ->join('kelas_kuliah as kk', 'krs.id_kelas', '=', 'kk.id_kelas_kuliah')
            ->join('prodi as p', 'krs.id_prodi', '=', 'p.id_prodi')
            ->join('mata_kuliah as mk', 'krs.id_matkul', '=', 'mk.id_matkul')
            ->where('krs.id_kelas', $this->kelas_terpilih)
            ->select('krs.nim', 'krs.nama_mahasiswa', 'kk.nama_kelas_kuliah', 'mk.nama_mata_kuliah', 'p.nama_program_studi')
            ->orderBy('krs.nim')
            ->get();

        // Mapping nim → id_mahasiswa
        $nimToIdMap = Mahasiswa::whereIn('nim', $this->daftar_mahasiswa->pluck('nim'))
            ->pluck('id_mahasiswa', 'nim');

        // Ambil nilai akhir dari detail_nilai_perkuliahan
        $nilaiDb = DetailNilaiPerkuliahan::where('id_semester', $this->semester_terpilih)
            ->where('id_matkul', $this->matkul_terpilih)
            ->where('id_kelas_kuliah', $this->kelas_terpilih)
            ->whereIn('id_mahasiswa', $nimToIdMap->values())
            ->select('id_mahasiswa', 'nilai_angka', 'nilai_huruf')
            ->get()
            ->keyBy('id_mahasiswa');

        // Ambil data ikut_uas dan keterangan dari tabel nilai
        $nilaiUasDb = Nilai::where('id_kelas_kuliah', $this->kelas_terpilih)
            ->whereIn('id_mahasiswa', $nimToIdMap->values())
            ->get()
            ->keyBy('id_mahasiswa');

        // Loop mahasiswa dan isi data
        foreach ($this->daftar_mahasiswa as $mhs) {
            $nim = strtoupper($mhs->nim);
            $id = $nimToIdMap[$nim] ?? null;

            // isi ikutUas dan keterangan dari DB
            $nilaiRekap = $nilaiUasDb[$id] ?? null;
            $this->ikutUas[$nim] = $nilaiRekap->ikut_uas ?? 1;
            $this->keterangan[$nim] = $nilaiRekap->keterangan ?? '';

            // isi nilai akhir dan huruf
            $nilai = $nilaiDb[$id] ?? null;
            $this->nilaiAkhir[$nim] = $nilai->nilai_angka ?? null;
            $this->nilaiHuruf[$nim] = $nilai->nilai_huruf ?? null;
        }

        // Generate komponen dan ambil nilai komponen
        $this->generatePengaturanKomponen();
        $this->ambilNilaiKomponen();
    }



    public function generatePengaturanKomponen()
    {
        $listMatkul = ListMataKuliah::where('id_matkul', $this->matkul_terpilih)->first();
        if (!$listMatkul) return;

        $jenis = ($listMatkul->sks_praktek > 0 || $listMatkul->sks_praktek_lapangan > 0) ? 'praktek' : 'teori';

        $pengaturan = PengaturanKomponen::where('jenis', $jenis)->first();
        if (!$pengaturan) return;

        $pengaturan->load('komponen');

        $dosen = auth()->user()->dosen;
        $bobotCustom = [];
        if ($dosen && $this->kelas_terpilih) {
            $bobotCustom = BobotKomponenKelasDosen::where('id_dosen', $dosen->id_dosen)
                ->where('id_kelas_kuliah', $this->kelas_terpilih)
                ->pluck('persentase', 'id_komponen')
                ->toArray();
        }

        foreach ($pengaturan->komponen as $komponen) {
            if (isset($bobotCustom[$komponen->id])) {
                $komponen->pivot->bobot = $bobotCustom[$komponen->id];
            }
        }

        $this->pengaturan_komponen = $pengaturan;
    }
    public function setIkutUas($nim, $value)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if ($mahasiswa) {
            $mahasiswa->ikut_uas = $value;
            $mahasiswa->save();
        }
    }

    public function showEditBobot($komponenId)
    {
        $this->generatePengaturanKomponen();

        $komponen = $this->pengaturan_komponen->komponen->firstWhere('id', $komponenId);
        $this->editBobotId = $komponenId;
        $this->editBobotNama = $komponen->name ?? '-';

        $dosen = auth()->user()->dosen;
        $bobotCustom = null;
        if ($dosen && $this->kelas_terpilih) {
            $bobotCustom = BobotKomponenKelasDosen::where('id_dosen', $dosen->id_dosen)
                ->where('id_kelas_kuliah', $this->kelas_terpilih)
                ->where('id_komponen', $komponenId)
                ->value('persentase');
        }
        $this->editBobotValue = $bobotCustom ?? $komponen->pivot->bobot ?? $this->pengaturan_komponen->bobot_standar;
    }

    public function updateBobot()
    {
        $dosen = auth()->user()->dosen;
        if (!$dosen || !$this->kelas_terpilih || !$this->editBobotId) return;

        $bobotCustom = BobotKomponenKelasDosen::where('id_dosen', $dosen->id_dosen)
            ->where('id_kelas_kuliah', $this->kelas_terpilih)
            ->pluck('persentase', 'id_komponen')
            ->toArray();

        $bobotCustom[$this->editBobotId] = $this->editBobotValue;

        $totalBobot = 0;
        foreach ($this->pengaturan_komponen->komponen as $komponen) {
            $totalBobot += $bobotCustom[$komponen->id] ?? $komponen->pivot->bobot ?? $this->pengaturan_komponen->bobot_standar;
        }

        if ($totalBobot > 100) {
            $this->bobotError = "Total bobot komponen tidak boleh lebih dari 100! (Saat ini: $totalBobot)";
            return;
        } elseif ($totalBobot < 100) {
            $this->bobotError = "Total bobot komponen kurang dari 100! (Saat ini: $totalBobot)";
        } else {
            $this->bobotError = null;
        }

        BobotKomponenKelasDosen::updateOrCreate(
            [
                'id_dosen' => $dosen->id_dosen,
                'id_kelas_kuliah' => $this->kelas_terpilih,
                'id_komponen' => $this->editBobotId,
            ],
            [
                'persentase' => $this->editBobotValue,
            ]
        );

        $this->generatePengaturanKomponen();
        $this->editBobotId = null;
        $this->editBobotValue = null;
        $this->editBobotNama = null;
        $this->successMessage = 'Bobot berhasil diupdate!';
    }

    public function closeEditBobot()
    {
        $this->editBobotId = null;
        $this->editBobotValue = null;
        $this->editBobotNama = null;
        $this->generatePengaturanKomponen();
    }

    public function updatedInputNilai($value, $key)
    {
        // Cek format key
        if (!str_contains($key, '.')) return;

        [$nim, $komponenId] = explode('.', $key);

        // Validasi dan pembatasan nilai
        if ($value > 100) {
            $this->inputNilai[$nim][$komponenId] = 100;
        } elseif ($value < 0 || $value === null || $value === '') {
            $this->inputNilai[$nim][$komponenId] = 0;
        }

        $this->hitungNilaiPerMahasiswa($nim);
    }



    public function konversiHuruf($na)
    {
        if ($na < 40) return 'E';
        if ($na < 55) return 'D';
        if ($na < 60) return 'D+';
        if ($na < 65) return 'C';
        if ($na < 70) return 'C+';
        if ($na < 75) return 'B';
        if ($na < 80) return 'B+';
        return 'A';
    }


    public function updatedIkutUas($value, $key)
    {
        $nim = $key;
        $uasId = null;

        foreach ($this->pengaturan_komponen->komponen as $komponen) {
            if (strtolower($komponen->name) === 'uas') {
                $uasId = $komponen->id;
                break;
            }
        }

        if ($uasId) {
            if ($value == 0) {
                // Tidak ikut UAS, nilai UAS otomatis 0
                $this->inputNilai[$nim][$uasId] = 0;
                // Paksa trigger Livewire agar NA/NH update
                $this->inputNilai = $this->inputNilai;
            }
        }

        // Selalu hitung ulang NA/NH
        $this->hitungNilaiPerMahasiswa($nim);
    }
    protected function hitungNilaiPerMahasiswa($nim)
    {
        $na = 0;
        $totalBobot = 0;

        foreach ($this->pengaturan_komponen->komponen as $komponen) {
            $id = $komponen->id;
            $bobot = $komponen->pivot->bobot ?? $this->pengaturan_komponen->bobot_standar;
            $nilai = $this->inputNilai[$nim][$id] ?? 0;

            $na += ($nilai * $bobot / 100);
            $totalBobot += $bobot;
        }

        $this->nilaiAkhir[$nim] = $totalBobot == 100 ? round($na, 2) : null;
        $this->nilaiHuruf[$nim] = $totalBobot == 100 ? $this->konversiHuruf($na) : null;
    }



    public function getNilaiPerkuliahanBySemester($semesterId)
    {
        if (!$this->matkul_terpilih || !$this->kelas_terpilih) return [];

        // Ambil semua NIM dari peserta kelas ini
        $nimList = collect($this->daftar_mahasiswa)->pluck('nim');

        // Ambil nilai dari tabel detail_nilai_perkuliahan
        $nilaiDb = DetailNilaiPerkuliahan::where('id_semester', $semesterId)
            ->where('id_matkul', $this->matkul_terpilih)
            ->where('id_kelas_kuliah', $this->kelas_terpilih)
            ->whereIn('id_mahasiswa', $nimList)
            ->select('id_mahasiswa', 'nilai_angka', 'nilai_huruf')
            ->get()
            ->keyBy('id_mahasiswa');

        // Siapkan data final: semua mahasiswa tetap ditampilkan, nilai bisa null
        $data = [];
        foreach ($this->daftar_mahasiswa as $mhs) {
            $data[$mhs->nim] = [
                'nilai_angka' => $nilaiDb[$mhs->nim]->nilai_angka ?? null,
                'nilai_huruf' => $nilaiDb[$mhs->nim]->nilai_huruf ?? null,
            ];
        }

        return $data;
    }

    // public function simpanNilai()
    // {
    //     if (!$this->kelas_terpilih || !$this->semester_terpilih || !$this->matkul_terpilih) {
    //         return;
    //     }

    //     $nimList = collect($this->daftar_mahasiswa)->pluck('nim');
    //     $nimToIdMap = Mahasiswa::whereIn('nim', $nimList)->pluck('id_mahasiswa', 'nim');

    //     foreach ($this->daftar_mahasiswa as $mhs) {
    //         $nim = strtoupper($mhs->nim);
    //         $idMahasiswa = $nimToIdMap[$nim] ?? null;

    //         if (!$idMahasiswa) {
    //             Log::warning('Mahasiswa tidak ditemukan untuk NIM: ' . $nim);
    //             continue;
    //         }

    //         $totalNilai = 0;
    //         $totalBobot = 0;

    //         foreach ($this->pengaturan_komponen->komponen as $komponen) {
    //             $komponenId = $komponen->id;
    //             $nilaiInput = $this->inputNilai[$nim][$komponenId] ?? 0;
    //             $bobot = $komponen->pivot->bobot ?? $this->pengaturan_komponen->bobot_standar;

    //             $totalNilai += $nilaiInput * $bobot / 100;
    //             $totalBobot += $bobot;
    //         }

    //         $nilaiAkhir = $totalBobot == 100 ? round($totalNilai, 2) : null;
    //         $nilaiHuruf = $totalBobot == 100 ? $this->konversiHuruf($nilaiAkhir) : null;
    //         $ikutUas = $this->ikutUas[$nim] ?? 1;

    //         try {
    //             // Simpan nilai akhir ke detail_nilai_perkuliahan
    //             $detail = DetailNilaiPerkuliahan::updateOrCreate(
    //                 [
    //                     'id_semester' => $this->semester_terpilih,
    //                     'id_matkul' => $this->matkul_terpilih,
    //                     'id_kelas_kuliah' => $this->kelas_terpilih,
    //                     'id_mahasiswa' => $idMahasiswa,
    //                 ],
    //                 [
    //                     'nilai_angka' => $nilaiAkhir,
    //                     'nilai_huruf' => $nilaiHuruf,
    //                 ]
    //             );

    //             // Simpan nilai komponen per mahasiswa
    //             foreach ($this->pengaturan_komponen->komponen as $komponen) {
    //                 $komponenId = $komponen->id;
    //                 $nilaiKomponen = $this->inputNilai[$nim][$komponenId] ?? 0;

    //                 NilaiKomponenPerkuliahan::updateOrCreate(
    //                     [
    //                         'id_detail_nilai' => $detail->id,
    //                         'id_komponen' => $komponenId,
    //                     ],
    //                     [
    //                         'nilai' => $nilaiKomponen,
    //                     ]
    //                 );
    //             }

    //             // Simpan ke tabel nilai (rekap)
    //             Nilai::updateOrCreate(
    //                 [
    //                     'id_kelas_kuliah' => $this->kelas_terpilih,
    //                     'id_mahasiswa' => $idMahasiswa,
    //                 ],
    //                 [
    //                     'nilai_angka' => $nilaiAkhir,
    //                     'nilai_huruf' => $nilaiHuruf,
    //                     'ikut_uas' => $ikutUas,
    //                     'keterangan' => $this->keterangan[$nim] ?? 'Diinput oleh dosen',
    //                 ]
    //             );

    //             Log::info('Nilai berhasil disimpan', [
    //                 'id_mahasiswa' => $idMahasiswa,
    //                 'nilai_angka' => $nilaiAkhir,
    //                 'nilai_huruf' => $nilaiHuruf,
    //                 'ikut_uas' => $ikutUas,
    //             ]);
    //         } catch (\Exception $e) {
    //             Log::error('Gagal simpan nilai: ' . $e->getMessage(), [
    //                 'id_mahasiswa' => $idMahasiswa,
    //             ]);
    //         }
    //     }

    //     $this->dispatch('notifikasi', [
    //         'tipe' => 'success',
    //         'judul' => 'Data Disimpan',
    //         'deskripsi' => 'Nilai berhasil disimpan untuk semua mahasiswa.'
    //     ]);
    // }
    public function simpanNilai()
    {
        if (!$this->kelas_terpilih || !$this->semester_terpilih || !$this->matkul_terpilih) return;

        // Ambil daftar NIM yang punya input nilai
        $nimList = array_keys(array_filter($this->inputNilai, function ($komponenNilai) {
            return !empty(array_filter($komponenNilai, fn($nilai) => $nilai !== null && $nilai !== ''));
        }));

        // Jika tidak ada mahasiswa yang memiliki nilai, keluar
        if (empty($nimList)) {
            $this->dispatch('notifikasi', [
                'tipe' => 'warning',
                'judul' => 'Tidak Ada Nilai',
                'deskripsi' => 'Tidak ada mahasiswa yang memiliki nilai untuk disimpan.'
            ]);
            return;
        }

        // Ambil ID mahasiswa dari NIM
        $nimToIdMap = Mahasiswa::whereIn('nim', $nimList)->pluck('id_mahasiswa', 'nim');

        foreach ($nimList as $nim) {
            $idMahasiswa = $nimToIdMap[$nim] ?? null;
            if (!$idMahasiswa) continue;

            $totalNilai = 0;
            $totalBobot = 0;

            foreach ($this->pengaturan_komponen->komponen as $komponen) {
                $komponenId = $komponen->id;
                $nilaiInput = $this->inputNilai[$nim][$komponenId] ?? 0;
                $bobot = $komponen->pivot->bobot ?? $this->pengaturan_komponen->bobot_standar;

                $totalNilai += $nilaiInput * $bobot / 100;
                $totalBobot += $bobot;
            }

            $nilaiAkhir = $totalBobot == 100 ? round($totalNilai, 2) : null;
            $nilaiHuruf = $totalBobot == 100 ? $this->konversiHuruf($nilaiAkhir) : null;
            $ikutUas = $this->ikutUas[$nim] ?? 1;
            $keterangan = $this->keterangan[$nim] ?? null;

            try {
                $detail = DetailNilaiPerkuliahan::updateOrCreate(
                    [
                        'id_semester' => $this->semester_terpilih,
                        'id_matkul' => $this->matkul_terpilih,
                        'id_kelas_kuliah' => $this->kelas_terpilih,
                        'id_mahasiswa' => $idMahasiswa,
                    ],
                    [
                        'nilai_angka' => $nilaiAkhir,
                        'nilai_huruf' => $nilaiHuruf,
                    ]
                );

                foreach ($this->pengaturan_komponen->komponen as $komponen) {
                    $komponenId = $komponen->id;
                    $nilaiKomponen = $this->inputNilai[$nim][$komponenId] ?? 0;

                    NilaiKomponenPerkuliahan::updateOrCreate(
                        [
                            'id_detail_nilai' => $detail->id,
                            'id_komponen' => $komponenId,
                        ],
                        [
                            'nilai' => $nilaiKomponen,
                        ]
                    );
                }

                Nilai::updateOrCreate(
                    [
                        'id_kelas_kuliah' => $this->kelas_terpilih,
                        'id_mahasiswa' => $idMahasiswa,
                    ],
                    [
                        'nilai_angka' => $nilaiAkhir,
                        'nilai_huruf' => $nilaiHuruf,
                        'ikut_uas' => $ikutUas,
                        'keterangan' => $keterangan,
                    ]
                );
            } catch (\Exception $e) {
                Log::error("Gagal menyimpan nilai untuk $nim: " . $e->getMessage());
            }
        }

        $this->dispatch('notifikasi', [
            'tipe' => 'success',
            'judul' => 'Berhasil',
            'deskripsi' => 'Nilai berhasil disimpan untuk ' . count($nimList) . ' mahasiswa yang sudah diisi.'
        ]);
    }


    public function getBobotKomponenHybrid($id_komponen)
    {
        $custom = \App\Models\BobotKomponenKelasDosen::where('id_dosen', $this->id_dosen)
            ->where('id_kelas_kuliah', $this->id_kelas_kuliah)
            ->where('id_komponen', $id_komponen)
            ->first();

        if ($custom) {
            return $custom->bobot;
        }

        $default = \App\Models\PengaturanKomponen::where('id_komponen', $id_komponen)->first();
        return $default ? $default->bobot : null;
    }


    public function ambilNilaiKomponen()
    {
        if (empty($this->daftar_mahasiswa)) return;

        // Ambil semua ID mahasiswa dari daftar mahasiswa
        $nimList = collect($this->daftar_mahasiswa)->pluck('nim');
        $nimToIdMap = Mahasiswa::whereIn('nim', $nimList)->pluck('id_mahasiswa', 'nim');

        // Ambil semua detail_nilai terkait
        $detailNilaiMap = DetailNilaiPerkuliahan::where('id_semester', $this->semester_terpilih)
            ->where('id_matkul', $this->matkul_terpilih)
            ->where('id_kelas_kuliah', $this->kelas_terpilih)
            ->whereIn('id_mahasiswa', $nimToIdMap->values())
            ->get()
            ->keyBy('id_mahasiswa'); // index by id_mahasiswa

        // Ambil semua nilai komponen
        $detailIds = $detailNilaiMap->pluck('id');

        $nilaiKomponen = \App\Models\NilaiKomponenPerkuliahan::whereIn('id_detail_nilai', $detailIds)
            ->get();

        // Kelompokkan berdasarkan id_detail_nilai
        $grouped = $nilaiKomponen->groupBy('id_detail_nilai');

        // Mapping ke dalam inputNilai[nim][id_komponen]
        foreach ($this->daftar_mahasiswa as $mhs) {
            $nim = strtoupper($mhs->nim);
            $idMahasiswa = $nimToIdMap[$nim] ?? null;
            if (!$idMahasiswa) continue;

            $detailNilai = $detailNilaiMap[$idMahasiswa] ?? null;
            if (!$detailNilai) continue;

            $komponenList = $grouped[$detailNilai->id] ?? collect();

            foreach ($komponenList as $item) {
                $this->inputNilai[$nim][$item->id_komponen] = $item->nilai;
            }
        }
    }



    public function render()
    {
        return view('livewire.livewire-nilai-mahasiswa', [
            'pengaturan_komponen' => $this->pengaturan_komponen,
        ]);
    }
}
