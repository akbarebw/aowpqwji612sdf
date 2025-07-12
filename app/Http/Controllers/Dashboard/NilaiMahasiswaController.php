<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Nilai;
use App\Models\Prodi;
use App\Models\Semester;
use App\Models\KelasKuliah;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use App\Models\JenjangPendidikan;
use App\Http\Controllers\Controller;
use App\Models\DosenPengajarKelasKuliah;

class NilaiMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.nilai.index');
    }

    
}
