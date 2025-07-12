<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MahasiswaBimbinganDosen;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaBimbinganDosenController extends Controller
{
    public function index()
    {
        return view('dashboard.mahasiswa-bimbingan-dosen.index');
    }

    public function data_table()
    {
        $MahasiswaBimbinganDosen = MahasiswaBimbinganDosen::orderBy('judul', 'desc');

        return DataTables::of($MahasiswaBimbinganDosen)
            ->addColumn('action', function ($MahasiswaBimbinganDosen) {
                $actions = '';

            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
