<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\BiodataDosen;
use Illuminate\Http\Request;
use App\Models\PangkatGolongan;
use App\Http\Controllers\Controller;
use App\Models\StatusKeaktifanPegawai;
use Yajra\DataTables\Facades\DataTables;

class BiodataDosenController extends Controller
{
    public function index()
    {
        $statuskeaktifanpegawai = StatusKeaktifanPegawai::orderBy('created_at', 'desc')->get();


        $pangkatgolongan = PangkatGolongan::orderBy('created_at','desc')->get();
        return view('dashboard.biodata-dosen.index', compact('statuskeaktifanpegawai', 'pangkatgolongan'));

    }
    public function data_table(Request $request)
    {
        $query = BiodataDosen::orderBy('created_at', 'desc');

        if($request->statuskeaktifanpegawai) {
            $query->where('id_status_aktif', $request->statuskeaktifanpegawai);
        }
        if($request->pangkatgolongan) {
            $query->where('id_pangkat_golongan', $request->pangkatgolongan);
        }


         return DataTables::of($query)
            ->addColumn('action', function ($row) {
                 return '

                    <a href="' . route('dashboard.datamaster.biodata.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.biodata.dosen.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.biodata.dosen.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                 return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }
    public function print($id)
    {
        $biodatadosen = BiodataDosen::find($id);
        return view('dashboard.biodata-dosen.print', compact('biodatadosen'));
    }
}
