<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RekapKhsMahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakTranskrip extends Component
{
    public $nim;
    public $mahasiswa;
    public $mataKuliah = [];
    public $showPreview = false;

    // Search student by NIM
    public function cariMahasiswa()
    {
        $this->mahasiswa = RekapKhsMahasiswa::where('nim', $this->nim)->first();

        if ($this->mahasiswa) {
            $this->mataKuliah = RekapKhsMahasiswa::where('nim', $this->nim)
                ->orderBy('nama_periode')
                ->orderBy('nama_mata_kuliah')
                ->get();
            $this->showPreview = true;
        } else {
            $this->mataKuliah = [];
            $this->showPreview = false;
        }
    }

    // Generate the transcript PDF
    public function cetakTranskrip()
    {
        $data = [
            'mahasiswa' => $this->mahasiswa,
            'mataKuliah' => $this->mataKuliah
        ];

        // Explicitly cast nim to string to avoid type mismatch errors
        $pdf = Pdf::loadView('livewire.transkrip-pdf', $data);

        // Ensure nim is a string for the PDF filename
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Transkrip_' . (string)$this->mahasiswa->nim . '.pdf');
    }

    public function render()
    {
        return view('livewire.cetak-transkrip');
    }
}
