<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\TahunAjaran;
use App\Models\KrsMahasiswa;
use Illuminate\Http\Request;
use App\Models\PeriodePerkuliahan;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class KrsNilaiController extends Controller
{
    public function index()
    {
        $tahunAjaran = TahunAjaran::orderBy('created_at', 'desc')->get();
        $periode = PeriodePerkuliahan::orderBy('created_at', 'desc')->get();
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->get();
        return view('dashboard.krs-nilai.index', compact('prodi','periode'));
    }

    public function data_table(Request $request)
    {
        $query = KrsMahasiswa::orderBy('created_at', 'desc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.krs.mahasiswa.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.krs.mahasiswa.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.krs.mahasiswa.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $krs = KrsMahasiswa::find($id);
        return view('dashboard.krs-nilai.print', compact('krs'));
    }
}
