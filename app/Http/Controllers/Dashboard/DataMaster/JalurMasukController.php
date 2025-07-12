<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\JalurMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JalurMasukController extends Controller
{
    public function index()
    {
        return view('dashboard.jalur_masuk.index');
    }

    public function data_table()
    {
        $query = JalurMasuk::orderBy('nama_jalur_masuk','desc');

        return DataTables::of($query)
            ->addColumn('action', function ($item) {
                $actions = '';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }
}
