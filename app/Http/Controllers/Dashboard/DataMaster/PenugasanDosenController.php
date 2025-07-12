<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use App\Models\PenugasanDosen;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PenugasanDosenController extends Controller
{
    public function index()
    {
        $tahunajaran= TahunAjaran::orderBy('nama_tahun_ajaran', 'asc')->get();
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->get();
        return view('dashboard.penugasan-dosen.index', compact('tahunajaran','prodi'));
    }

    public function data_table(Request $request)
    {
        $query = PenugasanDosen::orderBy('nama_dosen', 'desc');


        if($request->tahunajaran) {
            $query->where('id_tahun_ajaran', $request->tahunajaran);
        }
        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

        

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.penugasan.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.penugasan.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.penugasan.dosen.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }
    
    public function print($id)
    {
        $penugasandosen = PenugasanDosen::find($id);
        return view('dashboard.penugasan-dosen.print', compact('penugasandosen'));
    }
}
