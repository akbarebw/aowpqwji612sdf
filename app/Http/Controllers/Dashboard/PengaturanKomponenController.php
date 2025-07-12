<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Komponen;
use App\Models\PengaturanKomponen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PengaturanKomponenController extends Controller
{
    public function index()
    {
        return view('dashboard.pengaturan-komponen.index');
    }

    public function data_table()
    {
        $pengaturan = PengaturanKomponen::with('komponen')->orderBy('jenis');

        return DataTables::of($pengaturan)
            ->addColumn('komponen', function ($item) {
                return $item->komponen->pluck('name')->implode(', ');
            })
            ->addColumn('action', function ($item) {
                return '
                    <a href="' . route('dashboard.pengaturan.komponen.edit', $item->id) . '" class="btn btn-primary btn-sm">
                        <i class="fa fa-pen"></i>
                    </a>
                    <button data-id="' . $item->id . '" class="btn btn-danger btn-sm delete">
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
        $komponen = Komponen::orderBy('name')->get();
        return view('dashboard.pengaturan-komponen.create', compact('komponen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string',
            'bobot_standar' => 'required|numeric',
            'komponen_id' => 'required|array',
        ]);

        $pengaturan = PengaturanKomponen::create([
            'jenis' => $request->jenis,
            'bobot_standar' => $request->bobot_standar,
        ]);

        $pengaturan->komponen()->sync($request->komponen_id);

        return redirect()->route('dashboard.pengaturan.komponen.index')->with('success', 'Pengaturan Komponen berhasil ditambahkan');
    }

    public function edit(PengaturanKomponen $pengaturan_komponen)
    {
        $listKomponen = Komponen::orderBy('name')->get();
        return view('dashboard.pengaturan-komponen.edit', [
            'pengaturan' => $pengaturan_komponen,
            'listKomponen' => $listKomponen,
        ]);
    }

    public function update(Request $request, PengaturanKomponen $pengaturan_komponen)
    {
        $request->validate([
            'jenis' => 'required|string',
            'bobot_standar' => 'required|numeric',
            'komponen_id' => 'required|array',
        ]);

        $pengaturan_komponen->update([
            'jenis' => $request->jenis,
            'bobot_standar' => $request->bobot_standar,
        ]);

        $pengaturan_komponen->komponen()->sync($request->komponen_id);

        return redirect()->route('dashboard.pengaturan.komponen.index')->with('success', 'Pengaturan Komponen berhasil diperbarui');
    }

    public function destroy(PengaturanKomponen $pengaturan_komponen)
    {
        try {
            $pengaturan_komponen->komponen()->detach();
            $pengaturan_komponen->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal dihapus: ' . $e->getMessage(),
            ]);
        }
    }
}
