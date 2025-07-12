<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\Periode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PeriodeController extends Controller
{
    public function index()
    {
        return view('dashboard.periode.index');
    }

    public function data_table()
    {
        $query = Periode::orderBy('nama_program_studi', 'desc');


        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                    return '

                        <a href="' . route('dashboard.datamaster.periode.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                        <a href="' . route('dashboard.datamaster.periode.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                        <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
                ';

                    return $actions;
                    })
                    ->addIndexColumn()
                ->make(true);
    }
}
