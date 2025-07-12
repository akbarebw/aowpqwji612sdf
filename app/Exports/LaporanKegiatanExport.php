<?php

namespace App\Exports;

use App\Models\Kegiatan;
use App\Models\Status;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet;

class LaporanKegiatanExport implements FromView
{
    protected $kegiatan;

    public function __construct($kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }


    public function view(): View
    {
        return view('livewire.export.layout-export-laporan-kegiatan', [
            'kegiatan' => $this->kegiatan
        ]);
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            'A1' => ['font' => ['bold' => true]],

            // Styling an entire column.
            'B'  => ['font' => ['italic' => true]],
        ];
    }
}
