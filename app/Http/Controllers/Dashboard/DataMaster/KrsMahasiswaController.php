<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\KrsMahasiswa;
use Illuminate\Http\Request;
use App\Models\ListMataKuliah;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class KrsMahasiswaController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('created_at', 'desc')->get();
        $listmatakuliah = ListMataKuliah::orderBy('created_at', 'desc')->get();
        return view('dashboard.krs-mahasiswa.index', compact('prodi','listmatakuliah'));
    }

    public function data_table(Request $request)
    {
        $query = KrsMahasiswa::orderBy('created_at', 'desc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

         if($request->listmatakuliah) {
            $query->where('nama_mata_kuliah', 'LIKE', '%' . $request->listmatakuliah . '%');
        }



        return DataTables::of($query)
        ->addColumn('action', function ($row) {
            return '

                <a href="' . route('dashboard.datamaster.krs.mahasiswa.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                <a href="' . route('dashboard.datamaster.krs.mahasiswa.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
        ';

            return $actions;

            })
            ->addIndexColumn()
            ->make(true);
    }

   
}
