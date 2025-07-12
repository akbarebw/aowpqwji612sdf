<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\JalurEvaluasi;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JalurEvaluasiController extends Controller
{
    public function index()
    {
        return view('dashboard.jalur-evaluasi.index');
    }
    public function data_table()
    {
        $jalurevaluasi = JalurEvaluasi::orderBy('id_jenis_evalusi', 'desc');
        return DataTables::of($jalurevaluasi)
            ->addColumn('action', function ($jalurevaluasi) {
                $actions = '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
