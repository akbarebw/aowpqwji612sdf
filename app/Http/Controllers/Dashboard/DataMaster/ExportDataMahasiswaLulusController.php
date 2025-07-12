<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExportDataMahasiswaLulus;
use Yajra\DataTables\Facades\DataTables;

class ExportDataMahasiswaLulusController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->get();
        return view('dashboard.export-data-mahasiswa-lulus.index', compact('prodi'));
    }

    public function data_table( Request $request)
    {
        $query = ExportDataMahasiswaLulus::orderBy('created_at', 'desc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }
        

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.export.data.mahasiswa.lulus.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.export.data.mahasiswa.lulus.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.export.data.mahasiswa.lulus.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $exportdatamahasiswalulus = ExportDataMahasiswaLulus::find($id);
        return view('dashboard.export-data-mahasiswa-lulus.print', compact('exportdatamahasiswalulus'));
    }

}
