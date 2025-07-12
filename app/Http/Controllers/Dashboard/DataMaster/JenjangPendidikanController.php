<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\JenjangPendidikan;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JenjangPendidikanController extends Controller
{
    public function index()
    {
        return view('dashboard.jenjang-pendidikan.index');
    }

    public function data_table()
    {
        $pendidikan = JenjangPendidikan::orderBy('id_jenjang_didik', 'desc');

        return DataTables::of($pendidikan)
            ->addColumn('action', function ($pendidikan) {
                $actions = '';

            })
            ->rawColumns(['action']) 
            ->make(true);
    }
}
