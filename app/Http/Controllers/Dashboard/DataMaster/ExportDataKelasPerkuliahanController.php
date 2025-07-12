<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\KelasKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ExportDataKelasPerkuliahan;

class ExportDataKelasPerkuliahanController extends Controller
{
    public function index()
    {
        $kelaskuliah = KelasKuliah::orderBy('created_at', 'desc')->get();	
        $prodi = Prodi::orderBy('created_at', 'desc')->get();
        return view('dashboard.export-data-kelas-perkuliahan.index', compact('prodi','kelaskuliah'));

    }

    public function data_table(Request $request)
    {
        $query = ExportDataKelasPerkuliahan::orderBy('created_at', 'desc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

        if ($request->kelaskuliah) {
            $query->where('id_kelas_kuliah', $request->kelaskuliah);
        }
        

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.export.data.kelas.perkuliahan.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.export.data.kelas.perkuliahan.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.export.data.kelas.perkuliahan.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }
    public function print($id)
    {
        $exportdatakelasperkuliahan = ExportDataKelasPerkuliahan::find($id);
        return view('dashboard.export-data-kelas-perkuliahan.print', compact('exportdatakelasperkuliahan'));
    }

}
