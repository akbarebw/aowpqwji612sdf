<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KegiatanStatus;
use App\Models\Provinsi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $semuaKegiatan = 0;
        $kegiatan = 0;
        $semuaPengguna = 0;
        $kegiatanDitolak = 0;
        $kegiatanDiterima = 0;
        $kegiatanDiproses = 0;

        $userWaitingVerified=0;

        if (auth()->user()->hasRole('ADM')){
            $semuaKegiatan = Kegiatan::all()->count();
            $kegiatan = Kegiatan::orderBy('created_at', 'asc')->whereHas('kegiatanHasStatus')->paginate(5)->filter(function ($query){
                return $query->kegiatanHasStatus->first()->status_id == Status::where('kode','ST02')->first()->id;
            })->flatten();
            $kegiatanDiterima = Kegiatan::all()->filter(function ($query){
                return $query->kegiatanHasStatus->first()->status_id == Status::where('kode','ST01')->first()->id;
            })->flatten()->count();
            $kegiatanDitolak = Kegiatan::all()->filter(function ($query){
                return $query->kegiatanHasStatus->first()->status_id == Status::where('kode','ST03')->first()->id;
            })->flatten()->count();

            $kegiatanDiproses = Kegiatan::all()->filter(function ($query){
                return $query->kegiatanHasStatus->first()->status_id == Status::where('kode','ST02')->first()->id;
            })->flatten()->count();

            $semuaPengguna = User::all()->count();
            $userWaitingVerified = User::whereNotNull('email_verified_at')->where('verifikasi_data_umum',0)->count();
        }else{
            $kegiatanDiproses = Kegiatan::where('users_id', auth()->user()->id)->get()->filter(function ($query){
                return $query->kegiatanHasStatus->first()->status_id == Status::where('kode','ST02')->first()->id;
            })->flatten()->count();

            $kegiatanDiterima = Kegiatan::where('users_id', auth()->user()->id)->get()->filter(function ($query){
                return $query->kegiatanHasStatus->first()->status_id == Status::where('kode','ST01')->first()->id;
            })->flatten()->count();

            $kegiatanDitolak = Kegiatan::where('users_id', auth()->user()->id)->get()->filter(function ($query){
                return $query->kegiatanHasStatus->first()->status_id == Status::where('kode','ST03')->first()->id;
            })->flatten()->count();

            $semuaKegiatan = Kegiatan::where('users_id', auth()->user()->id)->count();
            $kegiatan = Kegiatan::where('users_id', auth()->user()->id)->orderBy('created_at', 'asc')->paginate(5);
        }
        return view('home',compact('kegiatan','semuaKegiatan','kegiatanDiterima','kegiatanDiproses','kegiatanDitolak','semuaPengguna','userWaitingVerified'));
    }

    public function laporkanAksi(){
        $provinsi = Provinsi::pluck('name','id');
        return view('kegiatans.create',compact('provinsi'));
    }

    public function detailAksi($id){
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatans.show')->with('kegiatan', $kegiatan);
    }

    public function approveAksi($id){
        $kegiatans = null;

        $statusDiproses = Status::where('kode','ST01')->first()->id;
        $kegiatanStatus = KegiatanStatus::create([
            'kegiatan_id'=>$id,
            'status_id'=> $statusDiproses,
        ]);
        $kegiatanStatus->save();
        if (auth()->user()->hasRole('ADM')){
            $kegiatans = Kegiatan::paginate(10);
        }else{
            $kegiatans = Kegiatan::where('users_id', auth()->user()->id)->paginate(10);
        }
        return view('kegiatans.index')
            ->with('kegiatans', $kegiatans);
    }

}
