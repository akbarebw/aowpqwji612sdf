<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RekapKhsMahasiswa;
use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakKhs extends Component
{
    public $nim;
    public $mahasiswa;
    public $mataKuliah = [];
    public $showPreview = false;
    public $semester;
    public $daftarSemester = [];

    public function mount()
    {
        // Ambil daftar semester unik dari rekap KHS
        $this->daftarSemester = RekapKhsMahasiswa::select('nama_periode')->distinct()->pluck('nama_periode');
    }

    public function cariMahasiswa()
    {
        $this->mahasiswa = RekapKhsMahasiswa::where('nim', $this->nim)->where('nama_periode', $this->semester)->first();

        if ($this->mahasiswa) {
            $this->mataKuliah = RekapKhsMahasiswa::where('nim', $this->nim)
                ->where('nama_periode', $this->semester)
                ->get();
            $this->showPreview = true;
        } else {
            $this->mataKuliah = [];
            $this->showPreview = false;
        }
    }

    public function cetakKHS()
    {
        if (!$this->mahasiswa) return;

        $data = [
            'mahasiswa' => $this->mahasiswa,
            'mataKuliah' => $this->mataKuliah
        ];

        $pdf = Pdf::loadView('livewire.khs-pdf', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'KHS_' . $this->mahasiswa->nim . '.pdf');
    }

    public function render()
    {
        return view('livewire.cetak-khs');
    }
}
