<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TahunAjaranController extends Controller
{
    public function index()
    {
        return view('dashboard.tahun-ajaran.index');
    }

    public function data_table()
    {
        $TahunAjaran = TahunAjaran::orderBy('nama_tahun_ajaran', 'asc');

        return DataTables::of($TahunAjaran)
            ->addColumn('action', function ($TahunAjaran) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            
    }
}
