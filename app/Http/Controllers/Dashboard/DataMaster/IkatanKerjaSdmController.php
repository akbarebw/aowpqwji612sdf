<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\IkatanKerjaSdm;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class IkatanKerjaSdmController extends Controller
{
    public function index()
    {
        return view('dashboard.ikatan-kerja-sdm.index');
    }

    public function data_table()
    {
        $IkatanKerjaSdm = IkatanKerjaSdm::orderBy('nama_ikatan_kerja', 'asc');

        return DataTables::of($IkatanKerjaSdm)
            ->addColumn('action', function ($IkatanKerjaSdm) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
