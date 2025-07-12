<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\KebutuhanKhusus;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class KebutuhanKhususController extends Controller
{
    public function index()
    {
        return view('dashboard.kebutuhan-khusus.index');
    }

    public function data_table()
    {
        $KebutuhanKhusus = KebutuhanKhusus::orderBy('nama_kebutuhan_khusus', 'asc');

        return DataTables::of($KebutuhanKhusus)
            ->addColumn('action', function ($KebutuhanKhusus) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
