<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Agama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class NegaraController extends Controller
{
    public function index()
    {
        return view('dashboard.negara.index');
    }

    public function data_table()
    {
        $agama = Agama::orderBy('nama_negara', 'asc');

        return DataTables::of($negara)
            ->addColumn('action', function ($negara) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
