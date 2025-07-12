<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\PerhitunganSKS;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;    

class PerhitunganSKSController extends Controller
{
    public function index()
    {
        return view('dashboard.perhitungan-sks.index');
    }   

    public function data_table(Request $request)
    {
        $query = PerhitunganSKS::orderBy('nama_dosen', 'asc');

            return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('dashboard.datamaster.perhitungan.sks.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.perhitungan.sks.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.perhitungan.sks.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['action']) 
            ->addIndexColumn()
            ->make(true);
    }

}
