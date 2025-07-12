<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Pembiayaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PembiayaanController extends Controller
{
    public function index()
    {
        return view('dashboard.pembiayaan.index');
    }
    public function data_table()
    {
        $pembiayaan = Pembiayaan::orderBy('nama_pembiayaan', 'desc');
        return DataTables::of($pembiayaan)
            ->addColumn('action', function ($pembiayaan) {
                $actions = '';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
