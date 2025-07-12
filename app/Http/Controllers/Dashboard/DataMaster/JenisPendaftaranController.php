<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\JenisPendaftaran;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JenisPendaftaranController extends Controller
{
    public function index()
    {
        return view('dashboard.jenis-pendaftaran.index');
    }
    public function data_table()
    {
        $jenispendaftaran = JenisPendaftaran::orderBy('id_jenis_daftar', 'desc');
        return DataTables::of($jenispendaftaran)
            ->addColumn('action', function ($jenispendaftaran) {
                $actions = '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
