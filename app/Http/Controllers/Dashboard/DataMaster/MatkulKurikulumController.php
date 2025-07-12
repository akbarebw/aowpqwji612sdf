<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\Semester;
use App\Models\Kurikulum;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Models\MatkulKurikulum;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class MatkulKurikulumController extends Controller
{
    public function index()
    {
        $matkul = MataKuliah::orderBy('nama_mata_kuliah', 'asc')->get();	
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->get();
        $semester = Semester::orderBy('nama_semester', 'asc')->get();	
        $kurikulum = Kurikulum::orderBy('nama_kurikulum', 'asc')->get();
        return view('dashboard.matkul-kurikulum.index', compact('prodi','matkul','semester','kurikulum'));
    }

    public function data_table(Request $request)
    {
        $query = MatkulKurikulum::orderBy('nama_mata_kuliah', 'asc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

        if($request->matkul) {
            $query->where('id_matkul', $request->matkul);
        }

        if($request->semester) {
            $query->where('id_semester', $request->semester);
        }

        if($request->kurikulum) {
            $query->where('id_kurikulum', $request->kurikulum);
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.matkul.kurikulum.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.matkul.kurikulum.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.matkul.kurikulum.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $matkulkurikulum = MatkulKurikulum::find($id);
        return view('dashboard.matkul-kurikulum.print', compact('matkulkurikulum'));
    }
}
