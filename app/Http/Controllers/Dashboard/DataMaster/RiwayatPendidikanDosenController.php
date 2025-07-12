<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RiwayatPendidikanDosen;
use Yajra\DataTables\Facades\DataTables;

class RiwayatPendidikanDosenController extends Controller
{
    public function index()
    {
        // $jenjangpendidikan = JenjangPendidikan::orderBy('nama_jenjang_didik', 'desc')->get();
        return view('dashboard.riwayat-pendidikan-dosen.index');
    }   

    public function data_table(Request $request)
    {
        $query = RiwayatPendidikanDosen::orderBy('nama_dosen', 'asc');

        // if($request->jenjangpendidikan) {
        //     $query->where('id_jenjang_didik', $request->jenjangpendidikan);
        // }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.riwayat.pendidikan.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.riwayat.pendidikan.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.riwayat.pendidikan.dosen.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }
    
    public function print($id)
    {
        $riwayatpendidikandosen = RiwayatPendidikanDosen::find($id);
        return view('dashboard.riwayat-pendidikan-dosen.print', compact('riwayatpendidikandosen'));
    }
}
