<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Bidang;
use App\Models\JenisBidang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BidangController extends Controller
{
    public function index()
    {
        return view('dashboard.bidang.index');
    }

    public function data_table()
    {
        $bidang = Bidang::with('jenisbidang')->orderBy('name', 'asc');

        return DataTables::of($bidang)
        ->addColumn('jenis_bidang', function ($row){
            return $row->jenisbidang->name ?? "-";
        })
        ->addColumn('action', function ($row) {
            return '
                 <a href=" ' . route('dashboard.bidang.edit', $row->id ) . ' " class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                 <button data-id="'. $row['id'] . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
            ';

         })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        $jenisbidang = JenisBidang::all(); 
        return view('dashboard.bidang.create', compact('jenisbidang'));
    }

       public function store(Request $request)
    { 
        $request->validate([
            'name' =>'string|max:255',
        ]); 

        $bidang = Bidang::create([ 
            'name' => $request->name,
            'id_jenis_bidang'=> $request->id_jenis_bidang,
        ]);
        
        return redirect()->route('dashboard.bidang.index')->with('success',' Bidang berhasil dibuat');
        
    }

    public function edit($id)
    {
        $bidang = Bidang::where('id', $id)->firstOrFail();
        $jenisbidang = JenisBidang::all(); 

        return view('dashboard.bidang.edit', compact('bidang', 'jenisbidang'));
    }

    public function update(Request $request, $id)
    {
        $bidang = Bidang::where('id', $id)->firstOrFail();
        $bidang->update([
            'name' => $request->name,
            'id_jenis_bidang' => $request->id_jenis_bidang,
            
        ]);

        return redirect()->route('dashboard.bidang.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $bidang = Bidang::where('id', $id)->firstOrFail();

        $action = $bidang->delete();

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