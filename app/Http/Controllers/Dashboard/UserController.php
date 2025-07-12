<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\PeriodePerkuliahan;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index');
    }

    public function create()
    {
        $periode = PeriodePerkuliahan::orderBy('nama_semester')->get();
    
        return view('dashboard.user.create');
    }

    public function store(Request $request) 
    {
        $option_create = $request->input('option_create');
        
    }
}
