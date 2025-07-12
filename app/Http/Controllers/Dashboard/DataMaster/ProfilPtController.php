<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\ProfilPt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ProfilPtController extends Controller
{
    public function index()
    {
        return view('dashboard.profil-pt.index');
    }

    public function data_table()
    {
        $profilpt = ProfilPt::orderBy('nama_perguruan_tinggi', 'asc');

        return DataTables::of($profilpt)
            ->addColumn('action', function ($profilpt) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
