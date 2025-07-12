<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Komponen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class KomponenController extends Controller
{
    public function index()
    {
        return view('dashboard.komponen.index');
    }

    public function data_table()
    {
        $komponen = Komponen::orderBy('name', 'asc');

        return DataTables::of($komponen)
            ->addColumn('action', function (Komponen $row) {
                return '
                    <a href="' . route('dashboard.komponen.edit', $row->id) . '" class="btn btn-primary btn-sm">
                        <i class="fa fa-pen"></i>
                    </a>
                    <button data-id="' . $row->id . '" class="btn btn-danger btn-sm delete">
                        <i class="fa fa-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.komponen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Komponen::create([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.komponen.index')->with('success', 'Komponen berhasil dibuat');
    }

    public function edit(Komponen $komponen)
    {
        return view('dashboard.komponen.edit', compact('komponen'));
    }

    public function update(Request $request, Komponen $komponen)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $komponen->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.komponen.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Komponen $komponen)
    {
        if ($komponen->delete()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Data gagal dihapus',
        ]);
    }
}
