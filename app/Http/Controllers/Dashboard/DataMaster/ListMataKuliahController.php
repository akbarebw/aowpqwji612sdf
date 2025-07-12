<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\ListMataKuliah;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ListMataKuliahController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('created_at', 'desc')->get();
        return view('dashboard.list-mata-kuliah.index', compact('prodi'));
    }

    public function data_table(Request $request)
    {
        $query = ListMataKuliah::orderBy('created_at', 'desc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
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
        $listmatakuliah = ListMataKuliah::find($id);
        return view('dashboard.list-mata-kuliah.print', compact('listmatakuliah'));
    }
}
