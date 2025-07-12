<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\NilaiTransferPendidikanMahasiswa;

class NilaiTransferPendidikanMahasiswaController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('created_at', 'desc')->get();
        $matkul = NilaiTransferPendidikanMahasiswa::select('nama_mata_kuliah_asal')->distinct()->get();
        $semester = Semester::orderBy('created_at', 'desc')->get();
        return view('dashboard.nilai-transfer-pemhas.index', compact('prodi', 'matkul', 'semester'));
    }

    public function data_table(Request $request)
    {
        $query = NilaiTransferPendidikanMahasiswa::query()->orderBy('nama_semester');
    
        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }
    
        if ($request->matkul) {
            $query->where('nama_mata_kuliah_asal', 'LIKE', '%' . $request->matkul . '%');
        }

        if ($request->semester) {
            $query->where('id_semester', $request->semester . '%');
        }
    
        return DataTables::eloquent($query)
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('dashboard.datamaster.nilai.transfer.pemhas.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.nilai.transfer.pemhas.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
                ';
            })
            ->addIndexColumn()
            ->make(true);
    }
    

}
