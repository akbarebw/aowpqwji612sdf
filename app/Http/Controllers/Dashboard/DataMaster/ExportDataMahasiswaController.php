<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Agama;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\ExportDataMahasiswa;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ExportDataMahasiswaController extends Controller
{
    public function index()
    {
        $agama = Agama::orderBy('created_at', 'desc')->get();	
        $prodi = Prodi::orderBy('created_at', 'desc')->get();
        return view('dashboard.export-data-mahasiswa.index', compact('prodi','agama'));
    }

    public function data_table(Request $request)
    {
        $query = ExportDataMahasiswa::orderBy('created_at', 'desc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

        if ($request->agama) {
            $query->where('id_agama', 'LIKE', '%' . $request->agama . '%');
        }
        

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.mahasiswa.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.mahasiswa.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.mahasiswa.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $exportdatamahasiswa = ExportDataMahasiswa::find($id);
        return view('dashboard.export-data-mahasiswa.print', compact('exportdatamahasiswa'));
    }
}
