<?php
namespace App\Http\Controllers\Dashboard\DataMaster;

use App\Models\JenisSms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JenisSmsController extends Controller
{
    public function index()
    {
        return view('dashboard.jenis-sms.index');
    }

    public function data_table()
    {
        $JenisSms = JenisSms::orderBy('id_jenis_sms', 'desc');

        return DataTables::of($JenisSms)
            ->addColumn('action', function ($JenisSms) {
                $actions = '';

            })
            ->rawColumns(['action']) 
            ->addIndexColumn()
            ->make(true);
    }
}
