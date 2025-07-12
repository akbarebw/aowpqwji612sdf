<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenPengujiController extends Controller
{
    public function index()
    {
        return view('dashboard.dosen-penguji.index');
    }
}
