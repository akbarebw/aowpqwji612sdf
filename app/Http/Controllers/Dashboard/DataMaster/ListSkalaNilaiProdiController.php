<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\ListSkalaNilaiProdi;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ListSkalaNilaiProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->get();
        return view('dashboard.list-skala-nilai-prodi.index', compact('prodi'));
    }

    public function data_table(Request $request)
    {
        $query = ListSkalaNilaiProdi::orderBy('nilai_indeks', 'desc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }


        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.list.skala.nilai.prodi.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.list.skala.nilai.prodi.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.list.skala.nilai.prodi.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }
    
    public function print($id)
    {
        $listskalanilaiprodi = ListSkalaNilaiProdi::find($id);
        return view('dashboard.list-skala-nilai-prodi.print', compact('listskalanilaiprodi'));
    }
}
