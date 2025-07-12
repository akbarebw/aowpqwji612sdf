<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\JenisKeluar;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class JenisKeluarController extends Controller
{
    public function index()
    {
        return view('dashboard.jenis-keluar.index');
    }
    public function data_table()
    {
        $jenisKeluar = JenisKeluar::orderBy('jenis_keluar', 'desc');
        return DataTables::of($jenisKeluar)
            ->addColumn('action', function ($jenisKeluar) {
                $actions = '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
