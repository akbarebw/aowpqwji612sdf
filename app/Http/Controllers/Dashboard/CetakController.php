<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\DetailNilaiPerkuliahan;
use App\Models\Nilai;
use App\Models\Semester;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Log;

class CetakController extends Controller
{
    public function index()
    {
        return view('dashboard.nilai.cetak');
    }

    public function transkrip()
    {
        return view('dashboard.nilai.transkrip');
    }
}
