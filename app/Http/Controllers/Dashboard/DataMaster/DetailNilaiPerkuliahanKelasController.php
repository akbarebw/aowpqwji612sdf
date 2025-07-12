<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailNilaiPerkuliahan;
use Yajra\DataTables\Facades\DataTables;

class DetailNilaiPerkuliahanKelasController extends Controller
{
    public function index()
    {
        return view('dashboard.detail-nilai-perkuliahan-kelas.index');
    }

    public function data_table()
    {
        $detailnilaiperkuliahankelas = DetailNilaiPerkuliahan::orderBy('id_semester', 'desc');

        return DataTables::of($detailnilaiperkuliahankelas)
            ->addColumn('action', function ($detailnilaiperkuliahankelas) {
                $actions = '';

            })
            ->rawColumns(['action']) 
            ->addIndexColumn()
            ->make(true);
    }
}
