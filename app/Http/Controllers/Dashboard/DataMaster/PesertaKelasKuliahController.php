<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\PesertaKelasKuliah;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PesertaKelasKuliahController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('created_at', 'desc')->get();
        return view('dashboard.peserta-kelas-kuliah.index', compact('prodi'));
    }

    public function data_table( Request $request)
    {
        $query = PesertaKelasKuliah::orderBy('created_at', 'desc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }
        

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.mata.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.mata.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.mata.kuliah.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }
    
    public function print($id)
    {
        $pesertakelaskuliah = PesertaKelasKuliah::find($id);
        return view('dashboard.peserta-kelas-kuliah.print', compact('pesrtakelaskuliah'));
    }
}
