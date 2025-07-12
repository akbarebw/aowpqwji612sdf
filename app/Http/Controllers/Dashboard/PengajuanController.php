<?php

namespace App\Http\Controllers\Dashboard;

use Str;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class PengajuanController extends Controller
{
    public function index()
    {
        return view('dashboard.pengajuan.index');
    }


    public function data_table()
    {
        $pengajuan = Pengajuan::orderBy('created_at', 'desc');
    
        return DataTables::of($pengajuan)
            ->addColumn('sk_pangkat_terakhir', function ($row) {
                $filePath = public_path('storage/' . $row->sk_pangkat_terakhir);
                if ($row->sk_pangkat_terakhir && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sk_pangkat_terakhir) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('sk_pns', function ($row) {
                $filePath = public_path('storage/' . $row->sk_pns);
                if ($row->sk_pns && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sk_pns) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('dp3_skp', function ($row) {
                $filePath = public_path('storage/' . $row->dp3_skp);
                if ($row->dp3_skp && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->dp3_skp) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('dashboard.pengajuan.edit', $row->id) . '" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['sk_pangkat_terakhir', 'sk_pns', 'dp3_skp', 'action'])
            ->addIndexColumn()
            ->make(true);
    }
    
    public function create()
    {
        return view('dashboard.pengajuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sk_pangkat_terakhir' => 'required|file|max:50000',
            'sk_pns' => 'required|file|max:50000',
            'dp3_skp' => 'required|file|max:50000',
        ]);
    
        $uploadPath = public_path('storage/pengajuan');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true); // bikin folder kalau belum ada
        }
    
        $skPangkat = null;
        $skPns = null;
        $dp3Skp = null;
    
        if ($request->hasFile('sk_pangkat_terakhir')) {
            $file = $request->file('sk_pangkat_terakhir');
            $fileName = 'SKPangkat_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skPangkat = 'pengajuan/' . $fileName;
        }
    
        if ($request->hasFile('sk_pns')) {
            $file = $request->file('sk_pns');
            $fileName = 'SKPNS_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skPns = 'pengajuan/' . $fileName;
        }
    
        if ($request->hasFile('dp3_skp')) {
            $file = $request->file('dp3_skp');
            $fileName = 'DP3SKP_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $dp3Skp = 'pengajuan/' . $fileName;
        }
    
        Pengajuan::create([
            'sk_pangkat_terakhir' => $skPangkat,
            'sk_pns' => $skPns,
            'dp3_skp' => $dp3Skp,
        ]);
    
        return redirect()->route('dashboard.pengajuan.index')->with('success', 'Pengajuan berhasil diajukan');
    }
    

    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('dashboard.pengajuan.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        $skPangkat = $pengajuan->sk_pangkat_terakhir;
        $skPns = $pengajuan->sk_pns;
        $dp3Skp = $pengajuan->dp3_skp;

        if ($request->hasFile('sk_pangkat_terakhir')) {
            $skPangkat = $request->file('sk_pangkat_terakhir')->store('pengajuan', 'public');
        }

        if ($request->hasFile('sk_pns')) {
            $skPns = $request->file('sk_pns')->store('pengajuan', 'public');
        }

        if ($request->hasFile('dp3_skp')) {
            $dp3Skp = $request->file('dp3_skp')->store('pengajuan', 'public');
        }

        $pengajuan->update([
            'sk_pangkat_terakhir' => $skPangkat,
            'sk_pns' => $skPns,
            'dp3_skp' => $dp3Skp,
        ]);

        return redirect()->route('dashboard.pengajuan.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    }
}
