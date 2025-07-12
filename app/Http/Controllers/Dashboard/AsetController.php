<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Aset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AsetController extends Controller
{
    public function index()
    {
        return view('dashboard.aset.index');
    } 

    public function data_table()
    {
        $aset = Aset::orderBy('name', 'asc');

        return DataTables::of($aset)
            ->addColumn('file', function ($row) {
                return '
                    <a href="' . asset('storage/aset/' . $row->file) . '" class="btn btn-primary btn-sm" target="_blank">
                        Lihat File  
                    </a>
                ';
            })
            
            ->addColumn('action', function ($row) {
               return '
                    <a href=" ' . route('dashboard.aset.edit', $row->id ) . ' " class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                    <button data-id="'. $row['id'] . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
               ';

            })
            ->rawColumns(['file','action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.aset.create');
    }

    public function store(Request $request)
    { 
        $request->validate([
            'file' => 'required| max:50000'
        ]);

        $file_name = null;
        if ($request->hasfile('file')){
            $file = $request->file('file');
            $upload_path = public_path('storage/aset/');
            $file_name = 'Aset_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();

            $file->move($upload_path, $file_name);
            
        }

        $aset = Aset::create([
            'name' => $request->name,
            'file' => $file_name
        ]);

        return redirect()->route('dashboard.aset.index')->with('success','aset berhasil dibuat');

    }

    public function edit($id)
    {
        $aset = Aset::where('id', $id)->firstOrFail();
        return view('dashboard.aset.edit', compact('aset'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => 'required| max:50000'
        ]);

        $aset = Aset::where('id', $id)->firstOrFail();
        
        $file_name = null;
        if ($request->hasfile('file')){
            $file = $request->file('file');
            $upload_path = public_path('storage/aset/');
            $file_name = 'Aset_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();

            $file->move($upload_path, $file_name);
            
        } else {
            $file_name = $aset->file;
        }

        $aset->update([
            'name' => $request->name,
            'file' => $file_name,
        ]);

        return redirect()->route('dashboard.aset.index')->with('success', 'Data Berhasil Di Rubah');
    }

    public function destroy($id)
    {
        $aset = Aset::where('id', $id)->firstOrFail();

        $action = $aset->delete();

        if($action) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Di Hapus',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Gagll Di Hapus',
            ]);
        }
    }
}
