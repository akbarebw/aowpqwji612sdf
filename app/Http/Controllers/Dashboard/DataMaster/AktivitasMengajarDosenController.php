<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AktivitasMengajarDosen;
use Yajra\DataTables\Facades\DataTables;

class AktivitasMengajarDosenController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->get(); 
        $matkul = MataKuliah::orderBy('nama_mata_kuliah', 'asc')->get();
        return view('dashboard.aktivitas-mengajar-dosen.index', compact('prodi', 'matkul'));
    }

    public function data_table(Request $request)
    {
        $query = AktivitasMengajarDosen::orderBy('nama_dosen', 'asc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

        if ($request->matkul) {
            $query->where('id_matkul', $request->matkul);
        }


        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.aktivitas.mengajar.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.aktivitas.mengajar.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.aktivitas.mengajar.dosen.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }
    
    public function print($id)
    {
        $aktivitasmengajardosen = AktivitasMengajarDosen::find($id);
        return view('dashboard.aktivitas-mengajar-dosen.print', compact('aktivitasmengajardosen'));
    }
}
