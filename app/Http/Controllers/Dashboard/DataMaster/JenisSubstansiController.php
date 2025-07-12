<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\JenisSubstansi;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Dashboard\DataMaster\JenisSubstansiController;

class JenisSubstansiController extends Controller
{
    public function index()
    {
        return view('dashboard.jenis-substansi.index');
    }

    public function data_table()
    {
        $jenis_substansi = JenisSubstansi::orderBy('id_jenis_substansi', 'asc');

        return DataTables::of($jenis_substansi)
            ->addColumn('action', function ($jenis_substansi) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
