<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\JenisSertifikasi;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JenisSertifikasiController extends Controller
{
    public function index()
    {
        return view('dashboard.jenis-sertifikasi.index');
    }

    public function data_table()
    {
        $jenissertifikasi = JenisSertifikasi::orderBy('id_jenis_sertifikasi', 'desc');

        return DataTables::of($jenissertifikasi)
            ->addColumn('action', function ($jenissertifikasi) {
                $actions = '';

            })
            ->rawColumns(['action']) 
            ->addIndexColumn()
            ->make(true);
    }
}
