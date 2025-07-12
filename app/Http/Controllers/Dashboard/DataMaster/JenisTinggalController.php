<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\JenisTinggal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JenisTinggalController extends Controller
{
    public function index()
    {
        return view('dashboard.jenis-tinggal.index');
    }

    public function data_table()
    {
        $jenistinggal = JenisTinggal::orderBy('nama_jenis_tinggal', 'desc');

        return DataTables::of($jenistinggal)
            ->addColumn('action', function ($jenistinggal) {
                $actions = '';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
