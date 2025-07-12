<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExportDataPenugasanDosen;
use Yajra\DataTables\Facades\DataTables;

class ExportDataPenugasanDosenController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('created_at', 'desc')->get();
        return view('dashboard.export-data-penugasan-dosen.index', compact('prodi'));
    }

    public function data_table(Request  $request)
    {
        $query = ExportDataPenugasanDosen::orderBy('created_at', 'asc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                        <a href="' . route('dashboard.datamaster.export.data.penugasan.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                        <a href="' . route('dashboard.datamaster.export.data.penugasan.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                        <a href="' . route('dashboard.datamaster.export.data.penugasan.dosen.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                        <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
                ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $exportdatapenugasandosen = ExportDataPenugasanDosen::find($id);
        return view('dashboard.export-data-penugasan-dosen.print', compact('exportdatapenugasandosen'));
    }
}
