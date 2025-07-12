<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\DetailKurikulum;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Kurikulum;

class DetailKurikulumController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->get();
        $semester = Semester::orderBy('nama_semester', 'asc')->get();	
        $kurikulum = Kurikulum::orderBy('nama_kurikulum', 'asc')->get();
        return view('dashboard.detail-kurikulum.index', compact('prodi','semester', 'kurikulum'));
    }

    public function data_table(Request $request)
    {
        $query = DetailKurikulum::orderBy('nama_kurikulum', 'asc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
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

                    <a href="' . route('dashboard.datamaster.detail.kurikulum.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.detail.kurikulum.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.detail.kurikulum.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $detailkurikulum = DetailKurikulum::find($id);
        return view('dashboard.detail-kurikulum.print', compact('detailkurikulum'));
    }
}
