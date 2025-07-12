<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\TingkatPrestasi;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TingkatPrestasiController extends Controller
{
    public function index()
    {
        return view('dashboard.tingkat-prestasi.index');
    }

    public function data_table()
    {
        $TingkatPrestasi = TingkatPrestasi::orderBy('id_tingkat_prestasi', 'asc');

        return DataTables::of($TingkatPrestasi)
            ->addColumn('action', function ($TingkatPrestasi) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
