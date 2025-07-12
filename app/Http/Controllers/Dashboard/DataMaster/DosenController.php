<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Agama;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusKeaktifanPegawai;
use Yajra\DataTables\Facades\DataTables;

class DosenController extends Controller
{
    public function index()
    {
        $agama = Agama::orderBy('nama_agama', 'asc')->get();
        $status = StatusKeaktifanPegawai::orderBy('nama_status_aktif', 'asc')->get();
        return view('dashboard.dosen.index', compact('agama', 'status'));
    }

    public function data_table(Request $request)
    {
        $query = Dosen::orderBy('nidn', 'asc');

        if($request->agama) {
            $query->where('id_agama', $request->agama);
        }

        if($request->status) {
            $query->where('id_status_aktif', $request->status);
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.dosen.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $dosen = Dosen::find($id);
        return view('dashboard.dosen.print', compact('dosen'));
    }
}
