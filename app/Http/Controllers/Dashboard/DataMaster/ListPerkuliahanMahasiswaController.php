<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Prodi;
use App\Models\Semester;
use App\Models\Pembiayaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListPerkuliahanMahasiswa;
use Yajra\DataTables\Facades\DataTables;

class ListPerkuliahanMahasiswaController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->pluck('nama_program_studi', 'id_prodi');
        $semester = Semester::orderBy('nama_semester', 'asc')->get();
        $pembiayaan = Pembiayaan::orderBy('nama_pembiayaan', 'asc')->get();
        return view('dashboard.list-perkuliahan-mahasiswa.index', compact('prodi', 'semester', 'pembiayaan'));
    }

    public function data_table(Request $request)
    {
        $query = ListPerkuliahanMahasiswa::orderBy('nama_semester', 'asc');

        if($request->prodi) {
            $query->where('id_prodi', $request->prodi);
        }

        if($request->semester) {
            $query->where('id_semester', $request->semester);
        }

        if($request->pembiayaan) {
            $query->where('id_pembiayaan', $request->pembiayaan);
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '

                    <a href="' . route('dashboard.datamaster.list.perkuliahan.mahasiswa.show', $row->id) . '" class="btn btn-sm me-1 btn-secondary"><i class="fa fa-print"></i></a>
                    <a href="' . route('dashboard.datamaster.list.perkuliahan.mahasiswa.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.list.perkuliahan.mahasiswa.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function show($id)
    {
        $lisPerkuliahan = ListPerkuliahanMahasiswa::where('id', $id)->firstOrFail();
        $prodi = Prodi::all();
        $semester = Semester::all();
        $pembiayaan = Pembiayaan::all();

        return view('dashboard.list-perkuliahan-mahasiswa.show', compact(
            'lisPerkuliahan',
            'prodi',
            'semester',
            'pembiayaan'
        ));
    }

    public function create()
    {
        $prodi = Prodi::orderBy('nama_program_studi', 'desc')->pluck('nama_program_studi', 'id_prodi');
        $semester = Semester::orderBy('nama_semester', 'desc')->get();
        $pembiayaan = Pembiayaan::all();
        return view('dashboard.list-perkuliahan-mahasiswa.create', compact(
            'prodi',
            'semester',
            'pembiayaan'
        ));

    }

    public function store(Request $request)
    {
       
        ListPerkuliahanMahasiswa::create($request->all());

        // api pddidikti
        // $url = env('PDDIKTI_URL') . '/api/v1/list-perkuliahan-mahasiswa';

        return redirect()->route('dashboard.datamaster.list.perkuliahan.mahasiswa.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $lisPerkuliahan = ListPerkuliahanMahasiswa::where('id', $id)->firstOrFail();

        $prodi = Prodi::all();
        $semester = Semester::all();
        $pembiayaan = Pembiayaan::all();

        return view('dashboard.list-perkuliahan-mahasiswa.edit', compact(
            'lisPerkuliahan',
            'prodi',
            'semester',
            'pembiayaan'
        ));
    }

    public function update(Request $request, $id)
    {
        $listperkuliahanmahasiswa = ListPerkuliahanMahasiswa::find($id);
        $listperkuliahanmahasiswa->update($request->all());

        return redirect()->route('dashboard.datamaster.list.perkuliahan.mahasiswa.index')->with('success', 'Data Berhasil Diubah');
    }

    public function print($id)
    {
        $listperkuliahanmahasiswa = ListPerkuliahanMahasiswa::find($id);
        return view('dashboard.list.perkuliahan.mahasiswa.print', compact('listperkuliahanmahasiswa'));
    }
}