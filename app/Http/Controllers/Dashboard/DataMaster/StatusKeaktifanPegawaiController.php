<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusKeaktifanPegawai;
use Yajra\DataTables\Facades\DataTables;


class StatusKeaktifanPegawaiController extends Controller
{
    public function index()
    {
        return view('dashboard.status-keaktifan-pegawai.index');
    }

    public function data_table()
    {
        $statusKeaktifanPegawai = StatusKeaktifanPegawai::orderBy('nama_status_aktif', 'desc');

        return DataTables::of($statusKeaktifanPegawai)
            ->addColumn('action', function ($statusKeaktifanPegawai) {
                $actions = '';

            })
            ->rawColumns(['action']) 
            ->addIndexColumn()
            ->make(true);
    }
}
