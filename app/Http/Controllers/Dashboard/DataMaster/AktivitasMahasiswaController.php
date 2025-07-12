<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\AktivitasMahasiswa;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AktivitasMahasiswaController extends Controller
{
    public function index()
    {
        return view('dashboard.aktivitas-mahasiswa.index');
    }

    public function data_table()
    {
        $aktivitasMahasiswa = AktivitasMahasiswa::orderBy('id_semester', 'desc');

        return DataTables::of($aktivitasMahasiswa)
            ->addColumn('action', function ($aktivitasMahasiswa) {
                $actions = '';

            })
            ->rawColumns(['action']) 
            ->addIndexColumn()
            ->make(true);
    }
}
