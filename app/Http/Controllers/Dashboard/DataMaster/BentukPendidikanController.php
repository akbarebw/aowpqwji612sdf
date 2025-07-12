<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\BentukPendidikan;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BentukPendidikanController extends Controller
{
    public function index()
    {
        return view('dashboard.bentuk-pendidikan.index');
    }

    public function data_table()
    {
        $bentuk_pendidikan = BentukPendidikan::orderBy('nama_bentuk_pendidikan', 'desc');

        return DataTables::of($bentuk_pendidikan)
            ->addColumn('action', function ($bentuk_pendidikan) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
