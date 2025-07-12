<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\DataTerhapus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DataTerhapusController extends Controller
{
    public function index()
    {
        return view('dashboard.data-terhapus.index');
    }

    public function data_table(Request $request)
    {
        $query = DataTerhapus::orderBy('nama_mahasiswa', 'desc');


        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('dashboard.datamaster.data.terhapus.show', $row->id) . '" class="btn btn-sm me-1 btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.datamaster.data.terhapus.edit', $row->id) . '" class="btn btn-sm me-1 btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['id'] . '" class="btn btn-sm btn-danger me-1" id="btn-delete"><i class="fa fa-trash"></i></button>
            ';

                return $actions;
            })
            ->addIndexColumn()
            ->make(true);
    }
}
