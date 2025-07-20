<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RekapKhsMahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class CetakTranskrip extends Component
{
    public $nim;
    public $mahasiswa;
    public $mataKuliah = [];
    public $showPreview = false;
    public $totalSKS = 0;
    public $ipk = 0;
    public $predikat = '';

    public function cariMahasiswa()
    {
        $this->mahasiswa = RekapKhsMahasiswa::where('nim', $this->nim)->first();

        if ($this->mahasiswa) {
            $this->mataKuliah = RekapKhsMahasiswa::where('nim', $this->nim)
                ->orderBy('nama_periode')
                ->orderBy('nama_mata_kuliah')
                ->get();

            // Calculate total SKS and IPK
            $this->calculateIPK();

            $this->showPreview = true;
        } else {
            $this->mataKuliah = [];
            $this->showPreview = false;
        }
    }

    private function calculateIPK()
    {
        $this->totalSKS = 0;
        $totalMutu = 0;

        foreach ($this->mataKuliah as $mk) {
            $this->totalSKS += $mk->sks_mata_kuliah;

            // Convert grade to index
            $nilaiIndeks = $this->convertGradeToIndex($mk->nilai_huruf);
            $totalMutu += $mk->sks_mata_kuliah * $nilaiIndeks;
        }

        $this->ipk = $this->totalSKS > 0 ? $totalMutu / $this->totalSKS : 0;
        $this->predikat = $this->getGraduationPredicate($this->ipk);
    }

    private function convertGradeToIndex($grade)
    {
        return match ($grade) {
            'A' => 4,
            'B+' => 3.5,
            'B' => 3,
            'C+' => 2.5,
            'C' => 2,
            'D+' => 1.5,
            'D' => 1,
            'E' => 0,
            default => 0,
        };
    }

    private function getGraduationPredicate($ipk)
    {
        if ($ipk >= 3.51) return 'Pujian';
        if ($ipk >= 3.00) return 'Sangat Memuaskan';
        if ($ipk >= 2.50) return 'Memuaskan';
        if ($ipk >= 2.00) return 'Cukup';
        return '-';
    }

    public function cetakTranskrip()
    {
        $this->calculateIPK();

        $data = [
            'mahasiswa' => $this->mahasiswa,
            'mataKuliah' => $this->mataKuliah,
            'totalSKS' => $this->totalSKS,
            'ipk' => $this->ipk,
            'predikat' => $this->predikat,
            'nomorTranskrip' => '/PL21/PS/TRK/' . date('Y')
        ];

        $pdf = Pdf::loadView('livewire.transkrip-pdf', $data);

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'Transkrip_' . $this->mahasiswa->nim . '.pdf'
        );
    }

    public function render()
    {
        return view('livewire.cetak-transkrip');
    }
}
