<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\KelasKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DosenPengajarKelasKuliah;
use Yajra\DataTables\Facades\DataTables;

class DosenPengajarKelasKuliahController extends Controller
{
    public function index(Request $request)
    {
        $kelaskuliah = KelasKuliah::orderBy('nama_kelas_kuliah', 'desc')->get();
        return view('dashboard.dosen-pengajar-kelas-kuliah.index', compact('kelaskuliah'));
    }   

    public function data_table(Request $request)
    {
        $query = DosenPengajarKelasKuliah::orderBy('nidn', 'desc');

        if($request->kelaskuliah) {
            $query->where('id_kelas_kuliah', $request->kelaskuliah);
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.dosen.pengajar.kelas.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.dosen.pengajar.kelas.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.dosen.pengajar.kelas.kuliah.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }
    
    public function print($id)
    {
        $dosenpengajarkelaskuliah = DosenPengajarKelasKuliah::find($id);
        return view('dashboard.dosen-pengajar-kelas-kuliah.print', compact('dosenpengajarkelaskuliah'));
    }
    
}
