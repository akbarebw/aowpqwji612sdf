<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExportDataNilaiTransfer;
use Yajra\DataTables\Facades\DataTables;

class ExportDataNilaiTransferController extends Controller
{
    public function index()
    {
        return view('dashboard.export-data-nilai-transfer.index');
    }

    public function data_table()
    {
        $exportdatanilaitransfer = ExportDataNilaiTransfer::orderBy('nama_mahasiswa', 'asc');

        return DataTables::of($exportdatanilaitransfer)
            ->addColumn('action', function ($exportdatanilaitransfer) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
