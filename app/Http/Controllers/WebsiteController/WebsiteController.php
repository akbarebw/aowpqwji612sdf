<?php

namespace App\Http\Controllers\WebsiteController;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Status;
use App\Models\AboutUs;
use App\Models\Kabkota;
use App\Models\Panduan;
use App\Models\Periode;
use App\Models\Working;
use App\Models\Kegiatan;
use Jenssegers\Date\Date;
use function Livewire\str;
use Laracasts\Flash\Flash;
use App\Models\EmisiCarbon;
use App\Models\Testimonial;
use App\Models\AksiMitigasi;
use App\Models\PageCategory;
use Illuminate\Http\Request;
use App\Mail\SendNotification;
use App\Models\KegiatanStatus;
use App\Models\DetailEmisiCarbon;
use App\Models\PenilaianPelaksana;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateKegiatanRequest;
use App\Http\Controllers\WebsiteController\Utility\HeaderStatic;

class WebsiteController extends HeaderStatic
{
    public function index(Request $request) {
        // $agendas = Agenda::orderBy('created_at','DESC')->get();
        // $listPost = Post::orderBy('created_at','DESC')->paginate(6);
        // $penilaianPelaksanas = PenilaianPelaksana::where("penilaian_pelaksana_id", null)->get();
        // $kalkulasiUser = User::where('verifikasi_data_umum',1)->whereNotNull('email_verified_at')->whereHas('roles',function ($q){
        //     $q->where('name','USR');
        // })->count();
        // $kalkulasiKegiatan = Kegiatan::whereHas("kegiatanHasStatus", function ($q){
        //     $q->where('status_id',2);
        // })->count();
        // $kalkulasiSafeguard = PenilaianPelaksana::whereHas("penilaianDetailSafeguards", function ($q){
        //     $q->whereHas("statusPenilaian");
        // })->count();

        // return view('web.frontend.home.index',compact('agendas','penilaianPelaksanas','listPost','kalkulasiKegiatan','kalkulasiSafeguard','kalkulasiUser'));
   
        return view('dashboard.index');
    }

    public function postDetail($slug_berita) {
        $postDetail = Post::where('slug',$slug_berita)->first();
        if(empty($postDetail)){
            return redirect(route('beranda'));
        }
        $listPost = Post::where('post_category_id', $postDetail->post_category_id)->paginate(6);

        $title = $postDetail->title;
        views($postDetail)->cooldown(5)->record();

        return view('web.frontend.post.detail_post',compact('postDetail','listPost','title'));
    }

    public function pageDetail($slug) {
        $pageDetail = Page::where('slug',$slug)->first();
        if(empty($pageDetail)){
            return redirect(route('beranda'));
        }
        $listPost = Post::paginate(6);

        $title = $pageDetail->title;
        views($pageDetail)->cooldown(5)->record();

        return view('web.frontend.page.detail_page',compact('pageDetail','listPost','title'));
    }

    public function pageCategoryDetail($slug) {
        $pageDetail = PageCategory::where('slug',$slug)->first();
        if(empty($pageDetail)){
            return redirect(route('beranda'));
        }
        $listPost = Post::paginate(6);
        $title = "SISSREDD+ :: ".$pageDetail->name;
        views($pageDetail)->cooldown(5)->record();

        return view('web.frontend.page_category.detail_page',compact('title','pageDetail','listPost'));
    }

    public function page(Request $request) {
        $title = "SISSREDD+ :: Page";
        $beritas = Page::whereHas('pageType', function ($query) use ($request) {
            $query->where('nama',$request->type)->orWhere('name_english',$request->type);
        })->orderBy('created_at','asc')->get();
//        $testimonial = Testimonial::get();
        $type = $request->type;

        return view('web.frontend.post.list',compact('title','beritas','testimonial','type'));
    }

    public function post(Request $request) {
        $title = "SISSRED+ :: Post";
        if(isset($request->search)){
            $listPost = Post::where('judul_id','like','%'.$request->search.'%')->orWhere('judul_id','like','%'.$request->search.'%')->orderBy('created_at','asc')->paginate(12);
        }else{
            $listPost = Post::orderBy('created_at','asc')->paginate(12);
        }


        return view('web.frontend.post.list',compact('title','listPost'));
    }

    public function agenda() {
        $title = "SISREDD :: Agenda SISREDD";

        return view('web.frontend.agenda.agenda');
    }

    public function about($slug) {
        $pageCategory = PageCategory::findBySlug($slug);
        return view('web.frontend.about.about',compact('pageCategory'));
    }

    public function contact() {
        return view('web.frontend.contact.contact');
    }

    public function faq() {
        return view('web.frontend.faq.faq');
    }

    public function resource() {
        return view('web.frontend.resource.file');
    }

    public function panduan(Request $request) {
        $title = "SISSRED+ :: Panduan";
        if(isset($request->search)){
            $panduans = Panduan::where('name_id','like','%'.$request->search.'%')->orWhere('name_en','like','%'.$request->search.'%')->orderBy('created_at','asc')->get();
        }else{
            $panduans = Panduan::orderBy('created_at','asc')->get();
        }

        return view('web.frontend.panduan.panduan',compact('panduans'));
    }

    public function perbaikanDataUmum($id,UpdateKegiatanRequest $request){
        $kegiatan = Kegiatan::find($id);
//        dd($request->all());
        if(empty($kegiatan)){
            Flash::error('Data tidak ditemukan');
            return redirect()->back();
        }
        try {
            DB::beginTransaction();

            $statusDiproses = Status::where('kode','ST02')->first()->id;
            $input = $request->except('_method','_token');
//            $input = $request->except('_method','_token','file_shp');
            if($request['pendanan_idr']!=''){
                $input['pendanan_idr'] = preg_replace('/[.]+/', '', $request['pendanan_idr']);
            }else{
                $input['pendanan_idr']=0;
            }

            if($request['pendanaan_dollar']!=''){
                $input['pendanaan_dollar'] = preg_replace('/[.]+/', '', $request['pendanaan_dollar']);
            }else{
                $input['pendanaan_dollar']=0;
            }
//            dd($input['file_shp']);
            Kegiatan::where('id',$kegiatan->id)->update($input);
//            if(isset($request->file_shp)){
//                $kegiatan->syncFromMediaLibraryRequest($request->file_shp)->toMediaCollection('file_shp');
//            }

            $kegiatanStatus = KegiatanStatus::create([
                'kegiatan_id'=>$kegiatan->id,
                'status_id'=> $statusDiproses,
            ]);
            $admin = User::where('email', 'admin@gmail.com')->first();

            if ($admin) {
                $token = $admin->createToken('activity-validation-token')->plainTextToken;

                $details = [
                    'user_name' => Auth::user()->name,
                    'nama_kegiatan' => $kegiatan->nama_kegiatan,
                    'jenis_kegiatan' => $kegiatan->jenis_kegiatan,
                    'nama_pelaksana' => $kegiatan->nama_pelaksana,
                    'nama_penanggung_jawab' => $kegiatan->penanggung_jawab,
                    'verification_link' => url('/validasi-data-umum-kegiatan?token=' . $token)
                ];

                Mail::to('deviana.selywita@gmail.com')->send(new SendNotification($details,'Verifikasi Data Umum','Verifikasi Data Umum'));
            }

            Alert::success('Data Umum Berhasil di perbaiki. ');
            DB::commit();
            return redirect()->back();
        }catch (\Exception $exception){
            DB::rollBack();
            Alert::error('err '.$exception);
            return redirect()->back();

        }
    }


    public function validasiDataUmum(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return redirect(route('login'))->with('error', 'Token is required!');
        }

        // Token verification and admin login
        $admin = User::whereHas('tokens', function($query) use ($token) {
            $query->where('token', hash('sha256', $token));
        })->first();

        if ($admin) {
            // Log in the admin
            Auth::login($admin);
            // Revoke the token
            $admin->tokens()->where('token', hash('sha256', $token))->delete();

            return redirect(route('kegiatans'));
        }

        return redirect(route('login'));
    }


}
