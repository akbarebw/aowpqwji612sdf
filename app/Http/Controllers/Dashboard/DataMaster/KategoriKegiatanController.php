<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\KategoriKegiatan;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class KategoriKegiatanController extends Controller
{
    public function index()
    {
        return view('dashboard.kategori-kegiatan.index');
    }
    public function data_table()
    {
        $kategorikegiatan = KategoriKegiatan::orderBy('id_kategori_kegiatan', 'desc');
        return DataTables::of($kategorikegiatan)
            ->addColumn('action', function ($kategorikegiatan) {
                $actions = '';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
