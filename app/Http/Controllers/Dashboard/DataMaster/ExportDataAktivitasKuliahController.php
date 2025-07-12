<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\StatusMahasiswa;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ExportDataAktivitasKuliah;

class ExportDataAktivitasKuliahController extends Controller
{
    public function index()
    {
        $statusmahasiswa = StatusMahasiswa::orderBy('created_at', 'desc')->get();
        $prodi = Prodi::orderBy('created_at', 'desc')->get();
        return view('dashboard.export-data-aktivitas-kuliah.index', compact('prodi','statusmahasiswa'));
    }

    public function data_table(Request $request)
    {
        $query = ExportDataAktivitasKuliah::orderBy('created_at', 'desc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

        if ($request->statusmahasiswa) {
            $query->where('nama_status_mahasiswa', 'LIKE', '%' . $request->statusmahasiswa . '%');
        }


        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.export.data.aktivitas.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.export.data.aktivitas.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.export.data.aktivitas.kuliah.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;

            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $exportdataaktivitaskuliah = ExportDataAktivitasKuliah::find($id);
        return view('dashboard.export-data-aktivitas-kuliah.print', compact('exportdataaktivitaskuliah'));
    }
}
