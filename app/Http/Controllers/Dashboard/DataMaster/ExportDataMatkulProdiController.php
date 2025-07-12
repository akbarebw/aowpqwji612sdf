<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\ListMataKuliah;
use App\Http\Controllers\Controller;
use App\Models\ExportDataMatkulProdi;
use Yajra\DataTables\Facades\DataTables;

class ExportDataMatkulProdiController extends Controller
{
    public function index()
    {
        $listmatakuliah = ListMataKuliah::orderBy('created_at', 'desc')->get();
        return view('dashboard.export-data-matkul-prodi.index', compact('listmatakuliah'));
    }

    public function data_table(Request $request)
    {
        $query = ExportDataMatkulProdi::orderBy('created_at', 'desc');

        if($request->listmatakuliah) {
            $query->where('nama_mata_kuliah', 'LIKE', '%' . $request->listmatakuliah . '%');
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                <a href="' . route('dashboard.datamaster.export.data.matkul.prodi.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                <a href="' . route('dashboard.datamaster.export.data.matkul.prodi.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                <a href="' . route('dashboard.datamaster.export.data.matkul.prodi.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
        ';

                return $actions;

            })
            ->addIndexColumn()
            ->make(true);
    }
    public function print($id)
    {
        $exportdatamatkulprodi = ExportDataMatkulProdi::find($id);
        return view('dashboard.export-data-matkul-prodi.print', compact('exportdatamatkulprodi'));
    }

}
