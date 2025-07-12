<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\KelasKuliah;
use Illuminate\Http\Request;
use App\Models\ListMatakuliah;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class KelasKuliahController extends Controller
{
    public function index(Request $request)
    {
        $id_prodi = collect();
        $matakuliah = ListMatakuliah::orderBy('created_at', 'desc')->get();

        if ($request->ajax() && $request->has('id_prodi')) {
            $matakuliah = ListMatakuliah::where('id_prodi', $request->id_prodi)
                                        ->orderBy('created_at', 'desc')
                                        ->get();
        
            return response()->json($matakuliah->values()); // memastikan array, bukan Collection

        }
        
        
         

        $prodi = Prodi::orderBy('created_at', 'desc')->get();

        return view('dashboard.kelas-kuliah.index', compact('prodi', 'matakuliah'));
    }

    public function data_table(Request $request)
    {
        $query = KelasKuliah::query()->orderBy('created_at', 'desc');
    
        if ($request->filled('prodi')) {
            $query->where('id_prodi', $request->prodi);

            if ($request->filled('matakuliah')) {
                $query->where('id_matkul', $request->matakuliah);
            }
            
        } 

    
        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('dashboard.datamaster.mata.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.mata.kuliah.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.mata.kuliah.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row->id . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
                ';
            })
            ->addIndexColumn()
            ->make(true);
    }
    
    
    public function print($id)
    {
        $kelaskuliah = KelasKuliah::find($id);
        return view('dashboard.kelas-kuliah.print', compact('kelaskuliah'));
    }
}
