<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\LembagaPengangkat;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class LembagaPengangkatController extends Controller
{
    public function index()
    {
        return view('dashboard.lembaga-pengangkat.index');
    }

    public function data_table()
    {
        $LembagaPengangkat = LembagaPengangkat::orderBy('nama_lembaga_angkat', 'asc');

        return DataTables::of($LembagaPengangkat)
            ->addColumn('action', function ($LembagaPengangkat) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
