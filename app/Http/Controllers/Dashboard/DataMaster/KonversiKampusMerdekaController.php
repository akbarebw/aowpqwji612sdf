<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KonversiKampusMerdeka;
use Yajra\DataTables\Facades\DataTables;

class KonversiKampusMerdekaController extends Controller
{
    public function index()
    {
        $matkul = KonversiKampusMerdeka::select('nama_mata_kuliah')->distinct()->get();
        $semester = KonversiKampusMerdeka::select('nama_semester')->distinct()->get();

        return view('dashboard.konversi-kampus-merdeka.index', compact('matkul', 'semester'));
    }

    public function data_table(Request $request)
    {
            $query = KonversiKampusMerdeka::orderBy('created_at', 'desc');
    
            if ($request->matkul) {
                $query->where('nama_mata_kuliah', 'LIKE', '%' . $request->matkul . '%');
            }

            if($request->semester) {
                $query->where('nama_semester', 'LIKE', '%' . $request->semester . '%');
            }
            
    
            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return '
    
                        <a href="' . route('dashboard.datamaster.konversi.kampus.merdeka.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                        <a href="' . route('dashboard.datamaster.konversi.kampus.merdeka.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                        <a href="' . route('dashboard.datamaster.konversi.kampus.merdeka.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                        <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
                ';
    
                    return $actions;
                })
                ->addIndexColumn()
                ->make(true);
        }
        
        public function print($id)
        {
            $konversikampusmerdeka = KonversiKampusMerdeka::find($id);
            return view('dashboard.konversi-kampus-merdeka.print', compact('konversikampusmerdeka'));
}
}
