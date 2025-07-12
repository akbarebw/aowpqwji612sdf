<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RiwayatFungsionalDosen;
use Yajra\DataTables\Facades\DataTables;

class RiwayatFungsionalDosenController extends Controller
{
    public function index()
    {
        return view('dashboard.riwayat-fungsional-dosen.index');
    }

    public function data_table()
    {
        $rekapkrsmahasiswa = RiwayatFungsionalDosen::orderBy('nama_dosen', 'desc');


        return DataTables::of($riwayatfungsionaldosen)
            ->addColumn('action', function ($riwayatfungsionaldosen) {
                $actions = '';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
