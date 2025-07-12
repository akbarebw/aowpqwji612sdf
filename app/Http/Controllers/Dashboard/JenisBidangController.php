<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\JenisBidang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JenisBidangController extends Controller
{
    public function index()
    {
        return view('dashboard.jenis-bidang.index');
    }

    public function data_table()
    {
        $jenisbidang = JenisBidang::orderBy('name', 'asc');

        return DataTables::of($jenisbidang)
        ->addColumn('action', function ($row) {
            return '
                 <a href=" ' . route('dashboard.jenis.bidang.edit', $row->id ) . ' " class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                 <button data-id="'. $row['id'] . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
            ';

         })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.jenis-bidang.create');
    }

       public function store(Request $request)
    { 
        $request->validate([
            'name' =>'string|max:255',
        ]); 

        $jenisbidang = JenisBidang::create([ 
            'name' => $request->name,
        ]);
        
        return redirect()->route('dashboard.jenis.bidang.index')->with('success','Jenis Bidang berhasil dibuat');
        
    }

    public function edit($id)
    {
        $jenisbidang = JenisBidang::where('id', $id)->firstOrFail();
        return view('dashboard.jenis-bidang.edit', compact('jenisbidang'));
    }

    public function update(Request $request, $id)
    {
        $jenisbidang = JenisBidang::where('id', $id)->firstOrFail();
        $jenisbidang->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.jenis.bidang.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $jenisbidang = JenisBidang::where('id', $id)->firstOrFail();

        $action = $jenisbidang->delete();

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