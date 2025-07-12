<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $mahasiswa = Mahasiswa::count();
        $dosen = Dosen::where('id_status_aktif', 1)->count();
        $prodi = Prodi::count();

        // dd(Auth::user());

        return view('dashboard.index', compact('mahasiswa', 'dosen', 'prodi'));
    }
}
