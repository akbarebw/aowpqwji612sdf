<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Illuminate\Http\Request;
use App\Models\BimbinganMahasiswa;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BimbinganMahasiswaController extends Controller
{
    public function index()
    {
        return view('dashboard.bimbingan-mahasiswa.index');
    }
}
