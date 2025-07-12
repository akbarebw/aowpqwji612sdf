<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\JabatanFungsional;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JabatanFungsionalController extends Controller
{
    public function index()
    {
        return view('dashboard.jabatan-fungsional.index');
    }

    public function data_table()
    {
        $jabfung = JabatanFungsional::orderBy('nama_jabatan_fungsional', 'desc');

        return DataTables::of($jabfung)
            ->addColumn('action', function ($jabfung) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
