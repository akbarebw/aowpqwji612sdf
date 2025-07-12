<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Semester;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class SemesterController extends Controller
{
    public function index()
    {
        $tahunajaran = TahunAjaran::orderBy('created_at', 'desc')->get();
        return view('dashboard.semester.index', compact('tahunajaran'));
    }

    public function data_table( Request $request)
    {
        $query = Semester::orderBy('created_at', 'desc');

        if($request->tahunajaran) {
            $query->where('id_tahun_ajaran', $request->tahunajaran);
        }
        

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.mata.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.mata.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.mata.kuliah.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $semester = Semester::find($id);
        return view('dashboard.semester.print', compact('semester'));
    }
}
