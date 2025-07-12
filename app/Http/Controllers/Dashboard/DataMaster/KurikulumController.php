<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\Kurikulum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class KurikulumController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('created_at', 'desc')->get();
        return view('dashboard.kurikulum.index', compact('prodi'));
    }

    public function data_table( Request $request)
    {
        $query = Kurikulum::orderBy('nama_kurikulum', 'desc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }
        

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.kurikulum.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.kurikulum.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.kurikulum.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);

    }
    // public function print($id)
    // {
    //     $kurikulum = Kurikulum::find($id);
    //     return view('dashboard.kurikulum.print', compact('kurikulum'));
    // }

    public function create()
    {
        $prodi = Prodi::all();
        $kurikulum = Kurikulum::all(); // TAMBAHKAN INI
    
        return view('dashboard.kurikulum.create', compact('prodi', 'kurikulum'));
    }

    public function store(Request $request)
    {
       
        Kurikulum::create($request->all());


        // api pddidikti
        $url = env('PDDIKTI_URL') . '/api/v1/kurikulum';

        return redirect()->route('dashboard.datamaster.kurikulum.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
{
    $kurikulum = Kurikulum::findOrFail($id);
    $prodi = Prodi::all();

    return view('dashboard.kurikulum.edit', compact('kurikulum', 'prodi'));
}

public function update(Request $request, $id)
{
    $kurikulum = Kurikulum::findOrFail($id);

    $kurikulum->update([
        'id_kurikulum' => $request->id_kurikulum,
        'nama_kurikulum' => $request->nama_kurikulum ?? $kurikulum->nama_kurikulum, // optional
        'nama_program_studi' => $request->nama_program_studi ?? $kurikulum->nama_program_studi, // optional
        'id_prodi' => $request->id_prodi,
        'jumlah_sks_lulus' => $request->jumlah_sks_lulus,
        'jumlah_sks_wajib' => $request->jumlah_sks_wajib,
        'jumlah_sks_pilihan' => $request->jumlah_sks_pilihan,
    ]);

    return redirect()->route('dashboard.datamaster.kurikulum.index')->with('success', 'Data Berhasil Diperbarui');
}

}
