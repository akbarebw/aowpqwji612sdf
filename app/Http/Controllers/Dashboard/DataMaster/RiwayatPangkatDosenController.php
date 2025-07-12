<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\RiwayatPangkatDosen;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class RiwayatPangkatDosenController extends Controller
{

    public function index()
    {
        $dosen = Dosen ::orderBy('created_at', 'desc')->get();
        return view('dashboard.riwayat-pangkat-dosen.index', compact('dosen'));
    }

    public function data_table(Request $request)
    {
        $query = RiwayatPangkatDosen::orderBy('created_at', 'desc');


        if ($request->dosen) {
            $query->where('id_dosen', $request->dosen);
        }


        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('dashboard.datamaster.riwayat.pangkat.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.riwayat.pangkat.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.riwayat.pangkat.dosen.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }
    public function print($id)
    {
        $riwayatpangkatdosen = RiwayatPangkatDosen::find($id);
        return view('dashboard.riwayat-pangkat-dosen.print', compact('riwayatpangkatdosen'));
    }
}
