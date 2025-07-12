<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\StatusKepegawaian;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class StatusKepegawaianController extends Controller
{
    public function index()
    {
        return view('dashboard.status-kepegawaian.index');
    }

    public function data_table()
    {
        $statuskepegawain = StatusKepegawaian::orderBy('nama_status_pegawai', 'desc');


        return DataTables::of($statuskepegawain)
            ->addColumn('action', function ($statuskepegawain) {
                $actions = '';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}

