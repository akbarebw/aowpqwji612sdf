<?php

namespace App\Http\Controllers\Dashboard\DataMaster;
use App\Models\Agama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AgamaController extends Controller
{
    public function index()
    {
        return view('dashboard.agama.index');
    }

    public function data_table()
    {
        $agama = Agama::orderBy('nama_agama', 'asc');

        return DataTables::of($agama)
            ->addColumn('action', function ($agama) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
