<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{

    public function __construct()
    {
        // $this->middleware('role:superadmin');
    }

    public function index()
    {
        // $user = Auth::user();
        //     $roles = $user->roles; // Retrieve roles of the authenticated user

        //     // Dump roles to debug
        //     dd($roles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
        ]);

        Komponen::create([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.settings.komponen.index')->with('success', 'Komponen berhasil ditambahkan.');
    }
}
