<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateKegiatanRequest;
use App\Mail\SendNotification;
use App\Models\Kegiatan;
use App\Models\KegiatanStatus;
use App\Models\Provinsi;
use App\Models\Status;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function reloadCaptcha(){
        return response()->json(['captcha'=>captcha_img('flat')]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'captcha' => 'required|captcha',
            'nama_kegiatan' => 'required|string|max:255',
            'jabatan_kegiatan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'mulai_kegiatan' => 'required',
            'akhir_kegiatan' => 'required',
            'nama_pelaksana' => 'required|string|max:255',
            'lokasi' => 'required|string|max:65535',
            'penanggung_jawab' => 'required|string|max:45',
            'mitra' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|string|max:45',
            'provinsi_id' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        try{
            DB::beginTransaction();

            $user = User::create($data);
            $user->syncRoles([2]);
            $user->password = bcrypt($data['password']);
            $user->save();

            $statusDiproses = Status::where('kode','ST02')->first()->id;
            $input = $data;

            if($data['pendanan_idr']!=''){
                $input['pendanan_idr'] = preg_replace('/[.]+/', '', $data['pendanan_idr']);
            }else{
                $input['pendanan_idr']=0;
            }

            if($data['pendanaan_dollar']!=''){
                $input['pendanaan_dollar'] = preg_replace('/[.]+/', '', $data['pendanaan_dollar']);
            }else{
                $input['pendanaan_dollar']=0;
            }
            $input['users_id'] = $user->id;
            $kegiatan = Kegiatan::create($input);
            $kegiatan->save();

            if(isset($data['file_shp'])){
                $kegiatan->addFromMediaLibraryRequest($data['file_shp'])->toMediaCollection('file_shp');
            }

            $kegiatanStatus = KegiatanStatus::create([
                'kegiatan_id'=>$kegiatan->id,
                'status_id'=> $statusDiproses,
            ]);

//            $admin = User::where('email', 'admin@gmail.com')->first();
//
//            if ($admin) {
//                $token = $admin->createToken('activity-validation-token')->plainTextToken;
//
//                $details = [
//                    'user_name' => $user->name,
//                    'nama_kegiatan' => $kegiatan->nama_kegiatan,
//                    'jenis_kegiatan' => $kegiatan->jenis_kegiatan,
//                    'nama_pelaksana' => $kegiatan->nama_pelaksana,
//                    'nama_penanggung_jawab' => $kegiatan->penanggung_jawab,
//                    'verification_link' => url('/validasi-data-umum-kegiatan?token=' . $token)
//                ];
//
//                Mail::to('deviana.selywita@gmail.com')->send(new SendNotification($details,'Verifikasi Data Umum','Verifikasi Data Umum'));
//            }

            DB::commit();
            Flash::success('Akun Berhasil di Daftarkan.');
            return $user;
        }catch (\Exception $exception){
            DB::rollBack();
            Flash::error('Gagal :'.$exception);
            return $exception;
        }

    }
}
