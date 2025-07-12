<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\JenisPrestasi;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JenisPrestasiController extends Controller
{
    //
    public function index() 
    {
        return view ('dashboard.jenis-prestasi.index');
    }

    public function data_table()
    {
        $jenisprestasi = JenisPrestasi::orderBy('id_jenis_prestasi', 'desc');

        return DataTables::of($jenisprestasi)
            ->addColumn('action', function ($jenisprestasi) {
                $actions = '';

            })
            ->rawColumns(['action']) 
            ->addIndexColumn()
            ->make(true);
    }
}
