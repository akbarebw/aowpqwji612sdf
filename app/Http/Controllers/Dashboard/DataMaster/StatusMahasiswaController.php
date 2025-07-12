<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\StatusMahasiswa;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class StatusMahasiswaController extends Controller
{
    public function index()
    {
        return view('dashboard.status-mahasiswa.index');
    }

    public function data_table()
    {
        $statusmahasiswa = StatusMahasiswa::orderBy('id_status_mahasiswa', 'desc');

        return DataTables::of($statusmahasiswa)
            ->addColumn('action', function ($statusmahasiswa) {
                $actions = '';

            })
            ->rawColumns(['action']) 
            ->addIndexColumn()
            ->make(true);
    }
}
