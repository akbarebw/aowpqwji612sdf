<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RiwayatNilaiMahasiswa;
use Yajra\DataTables\Facades\DataTables;

class RiwayatNilaiMahasiswaController extends Controller
{
    public function index()
    {
        return view('dashboard.riwayat-nilai-mahasiswa.index');
    }

    public function data_table(Request $request)
    {
        $query = RiwayatNilaiMahasiswa::orderBy('nama_mahasiswa', 'desc');


        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.riwayat.nilai.mahasiswa.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.riwayat.nilai.mahasiswa.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.riwayat.nilai.mahasiswa.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function print($id)
    {
        $riwayatnilaimahasiswa = RiwayatNilaiMahasiswa::find($id);
        return view('dashboard.riwayat-nilai-mahasiswa.print', compact('riwayatnilaimahasiswa'));
    }
}
