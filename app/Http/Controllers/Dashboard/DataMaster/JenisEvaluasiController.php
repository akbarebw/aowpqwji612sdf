<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\JenisEvaluasi;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JenisEvaluasiController extends Controller
{
    public function index()
    {
        return view('dashboard.jenis-evaluasi.index');
    }

    public function data_table()
    {
        $JenisEvaluasi = JenisEvaluasi::orderBy('nama_jenis_evaluasi', 'asc');

        return DataTables::of($JenisEvaluasi)
            ->addColumn('action', function ($JenisEvaluasi) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
