<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ProdiController extends Controller
{
    public function index()
    {
        return view('dashboard.prodi.index');
    }

    public function data_table()
    {
        $prodi = Prodi::orderBy('kode_program_studi', 'desc');

        return DataTables::of($prodi)
            ->addColumn('action', function ($prodi) {
                $actions = '';

            })
            ->rawColumns(['action']) 
            ->make(true);
    }
}
