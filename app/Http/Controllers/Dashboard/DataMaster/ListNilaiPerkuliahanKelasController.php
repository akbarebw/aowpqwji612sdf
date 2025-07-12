<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\KelasKuliah;
use Illuminate\Http\Request;
use App\Models\ListMataKuliah;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ListNilaiPerkuliahanKelas;
use App\Http\Controllers\Dashboard\DataMaster\ListNilaiPerkuliahanKelasController;

class ListNilaiPerkuliahanKelasController extends Controller
{
    public function index()
    {
        $matkul= ListMataKuliah::orderBy('created_at', 'desc')->get();
        $kelaskuliah= KelasKuliah::orderBy('created_at', 'desc')->get();
        return view('dashboard.list-nilai-perkuliahan-kelas.index', compact('matkul', 'kelaskuliah'));
    }

    public function data_table(Request $request)
    {
        $query = ListNilaiPerkuliahanKelas::orderBy('created_at', 'desc');    


        
        if($request->matkul) {
            $query->where('id_matkul', $request->matkul);
        }

        if($request->kelaskuliah) {
            $query->where('id_kelas_kuliah', $request->kelaskuliah);
        }
        
        
        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.list.nilai.perkuliahan.kelas.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.list.nilai.perkuliahan.kelas.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.list.nilai.perkuliahan.kelas.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);   
    }
    
    public function print($id)
    {
        $listnilaiperkuliahankelas = ListNilaiPerkuliahanKelas::find($id);
        return view('dashboard.list-nilai-perkuliahan-kelas.print', compact('listnilaiperkuliahankelas'));
    }
}
