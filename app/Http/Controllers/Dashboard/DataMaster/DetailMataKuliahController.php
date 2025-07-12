<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Models\DetailMataKuliah;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DetailMataKuliahController extends Controller
{
    public function index()
    {
        $matkul = MataKuliah::orderBy('created_at', 'asc')->get();	
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->get();
        return view('dashboard.detail-mata-kuliah.index', compact('prodi','matkul'));
    }

    public function data_table(Request $request)
    {
        $query = DetailMataKuliah::orderBy('nama_mata_kuliah', 'asc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

        if($request->matkul) {
            $query->where('id_matkul', $request->matkul);
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.detail.mata.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.detail.mata.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.detail.mata.kuliah.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $detailmatakuliah = DetailMataKuliah::find($id);
        return view('dashboard.detail-mata-kuliah.print', compact('detailmatakuliah'));
    }
}
