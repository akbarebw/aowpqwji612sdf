<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\LevelWilayah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;

class LevelWilayahController extends Controller
{
    public function index()
    {
        return view('dashboard.level-wilayah.index');
    }

    public function data_table()
    {
        $levelwilayah = LevelWilayah::orderBy('nama_level_wilayah', 'desc');

        return DataTables::of($levelwilayah)
            ->addColumn('action', function ($levelwiayah) {
                $actions = '';

            })
            ->rawColumns(['action']) 
            ->addIndexColumn()
            ->make(true);
    }
}
