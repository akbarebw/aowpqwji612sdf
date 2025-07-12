<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JabatanController extends Controller
{
    public function index()
    {
        return view('dashboard.jabatan.index');
    }

    public function data_table()
    {
        $jabatan = Jabatan::orderBy('name', 'asc');

        return DataTables::of($jabatan)
        ->addColumn('action', function ($row) {
            return '
                 <a href=" ' . route('dashboard.jabatan.edit', $row->id ) . ' " class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                 <button data-id="'. $row['id'] . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
            ';

         })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.jabatan.create');
    }

       public function store(Request $request)
    { 
        $request->validate([
            'name' =>'string|max:255',
        ]); 

        $jabatan = Jabatan::create([ 
            'name' => $request->name,
        ]);
        
        return redirect()->route('dashboard.jabatan.index')->with('success','Jabatan berhasil dibuat');
        
    }

    public function edit($id)
    {
        $jabatan = Jabatan::where('id', $id)->firstOrFail();
        return view('dashboard.jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::where('id', $id)->firstOrFail();
        $jabatan->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.jabatan.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::where('id', $id)->firstOrFail();

        $action = $jabatan->delete();

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