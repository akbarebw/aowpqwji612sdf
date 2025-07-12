<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class MataKuliahController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->get();
        return view('dashboard.mata-kuliah.index', compact('prodi'));
    }

 public function data_table(Request $request)
    {
        $query = MataKuliah::orderBy('created_at', 'desc');

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
    
    // public function print($id)
    // {
    //     $matakuliah = MataKuliah::find($id);
    //     return view('dashboard.mata-kuliah.print', compact('matakuliah'));
    // }

    public function create()
    {
        $prodi = Prodi::all();
        $mata_kuliah = MataKuliah::all();

        return view('dashboard.mata-kuliah.create', compact('prodi', 'mata_kuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mata_kuliah' => 'required|string|max:255',
            'nama_mata_kuliah' => 'required|string|max:255',
            'sks_mata_kuliah' => 'required|integer',
            'id_prodi' => 'required|string',
        ]);

        MataKuliah::create([
            'id_matkul' => Str::uuid(),
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
            'nama_mata_kuliah' => $request->nama_mata_kuliah,
            'sks_mata_kuliah' => $request->sks_mata_kuliah,
            'id_prodi' => $request->id_prodi,
            'nama_program_studi' => Prodi::where('id_prodi', $request->id_prodi)->value('nama_program_studi'),
        ]);

        return redirect()->route('dashboard.datamaster.mata.kuliah.index')
            ->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id); // Mengambil data mata kuliah berdasarkan id
        $prodi = Prodi::all(); // Mengambil semua data Prodi

        return view('dashboard.mata-kuliah.edit', compact('mataKuliah', 'prodi')); // Mengirimkan data ke view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mata_kuliah' => 'required|string|max:255',
            'nama_mata_kuliah' => 'required|string|max:255',
            'sks_mata_kuliah' => 'required|integer',
            'id_prodi' => 'required|string',
        ]);

        $mataKuliah = MataKuliah::findOrFail($id); // Mencari mata kuliah berdasarkan id
        $mataKuliah->update([
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
            'nama_mata_kuliah' => $request->nama_mata_kuliah,
            'sks_mata_kuliah' => $request->sks_mata_kuliah,
            'id_prodi' => $request->id_prodi,
            'nama_program_studi' => Prodi::where('id_prodi', $request->id_prodi)->value('nama_program_studi'),
        ]);

        return redirect()->route('dashboard.datamaster.mata.kuliah.index')
            ->with('success', 'Mata kuliah berhasil diperbarui.');
    }

}
