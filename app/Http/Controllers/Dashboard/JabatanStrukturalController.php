<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Bidang;
use Illuminate\Http\Request;
use App\Models\JabatanStruktural;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JabatanStrukturalController extends Controller
{
    public function index()
    {
        return view('dashboard.jabatan-struktural.index');
    }

    public function data_table()
    {
        $jabatanstruktural = JabatanStruktural::orderBy('name', 'asc');

        return DataTables::of($jabatanstruktural)
        ->addColumn('action', function ($row) {
            return '
                 <a href=" ' . route('dashboard.jabatan.struktural.edit', $row->id ) . ' " class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                 <button data-id="'. $row['id'] . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
            ';

         })
            ->rawColumns(['name','action'])
            ->addIndexColumn()
            ->make(true);


    }

    public function create()
    {
        $bidang = Bidang::all();
        return view('dashboard.jabatan-struktural.create', compact('bidang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'string|max:255',
            'bidang_id' => 'required',
        ]);

        JabatanStruktural::create([
            'name'=>$request->name,
            'bidang_id'=> $request->bidang_id
        ]);
        return redirect()->route('dashboard.jabatan.struktural.index')->with('success','Jabatan Struktural berhasil dibuat');
    }

    public function edit($id)
    {
        $jabatanstruktural = JabatanStruktural::where('id', $id)->firstOrFail();
        $bidang = Bidang::all();
        return view('dashboard.jabatan-struktural.edit', compact('jabatanstruktural', 'bidang'));
    }

    public function update(Request $request, $id)
    {
        $jabatanstruktural = JabatanStruktural::where('id', $id)->firstOrFail();
        $jabatanstruktural->update([
            'name' => $request->name,
            'bidang_id' => $request->bidang_id
        ]);

        return redirect()->route('dashboard.jabatan.struktural.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $jabatanstruktural = JabatanStruktural::where('id', $id)->firstOrFail();

        $action = $jabatanstruktural->delete();

        if($action) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Di Hapus',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Gagal Di Hapus',
            ]);
        }
    }
}
