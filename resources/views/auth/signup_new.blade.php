@extends('auth.layout_pendaftaran.app')

@section('content')
    <div class="content-body p-0" style="background: url({{asset('image/banner-homepage.jpeg')}});">
        <section id="horizontal-form-layouts" class="flexbox-container ml-lg-5" >
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-8 row bg-white pt-5 pb-5 rounded-1" style="margin-top: 8rem; margin-bottom: 8rem;">
                    <div class="col-md-9 mb-2">
                        <div class="mb-10">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <i class="ft-file-text green font-large-3"></i>
                                </div>
                                <div class="ml-1 mt-0-1 mb-0-1">
                                    <div class="text-bold-700 black font-medium-5">Form Register</div>
                                    <p class="mb-0 gray">Silahkan daftarkan akun anda di <b>SISREDD+</b> dangan menggunakan data yang valid</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 text-right">
                        <li class="dropdown dropdown-language nav-item">
                            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon @if(Config::get('app.locale')=='id') flag-icon-id @elseif (Config::get('app.locale')=='en') flag-icon-gb @endif box-shadow-0-1" style="margin-top: 2px"></i>
                                <span>@if(Config::get('app.locale')=='id') Indonesia @elseif (Config::get('app.locale')=='en') English @endif </span><span class="selected-language"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right rounded-2" aria-labelledby="dropdown-flag">
                                <a class="dropdown-item @if(Config::get('app.locale')=='id') active @endif" href="{!! LaravelLocalization::getLocalizedURL('id')  !!}"><i class="flag-icon flag-icon-id box-shadow-1"></i> Indonesia</a>
                                <a class="dropdown-item @if(Config::get('app.locale')=='en') active @endif" href="{!! LaravelLocalization::getLocalizedURL('en')  !!}"><i class="flag-icon flag-icon-gb box-shadow-1"></i> English</a>
                            </div>
                        </li>
                    </div>
                    <div class="col-md-12">
                        @include('adminlte-templates::common.errors')
                        {!! Form::open(['route' => 'register']) !!}
                        <div class="form-body">
                            <div class="card round box-shadow-1">
                                <div class="card-body">
                                    <div class="font-medium-2 text-bold-700 black mb-1"><i class="fa fa-pencil-square green"></i> @lang('register.informasi_umum')</div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 mb-1">
                                            <span class="text-bold-700 mb-1">@lang('register.nama_kegiatan')</span><span class="red"> *</span>
                                            {!! Form::text('nama_kegiatan', null, ['class' => 'form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>__('register.nama_kegiatan')]) !!}
                                        </div>
                                        <div class="form-group col-sm-4 mb-1">
                                            <span class="text-bold-700 mb-1">@lang('register.jenis_kegiatan')</span><span class="red"> *</span>
                                            {!! Form::text('jenis_kegiatan', null, ['class' => 'form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>__('register.jenis_kegiatan')]) !!}
                                        </div>
                                        <div class="form-group col-sm-4 mb-1">
                                            <span class="text-bold-700 ml-0-1 mb-0-1">@lang('register.nama_pelaksana')</span><span class="red"> *</span>
                                            {!! Form::text('nama_pelaksana', null, ['class' => 'form-control black  font-small-3 text-bold-600 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>__('register.nama_pelaksana'), 'maxlength' => 255, 'maxlength' => 255]) !!}
                                        </div>
                                        <div class="form-group col-sm-4 mb-1">
                                            <span class="text-bold-700 ml-0-1 mb-0-1">Telepon</span><span class="red"> *</span>
                                            {!! Form::text('no_hp', null, ['class' => 'form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>'telepon..', 'maxlength' => 255, 'maxlength' => 255]) !!}
                                        </div>
                                        <div class="form-group col-sm-4 mb-1">
                                            <span class="text-bold-700 ml-0-1 mb-0-1">@lang('register.jabatan_kegiatan')</span><span class="red"> *</span>
                                            {!! Form::text('jabatan_kegiatan', null, ['class' => 'form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>__('register.jabatan_kegiatan'), 'maxlength' => 255, 'maxlength' => 255]) !!}
                                        </div>
                                        <div class="form-group col-sm-4 mb-1">
                                            <span class="text-bold-700 ml-0-1 mb-0-1">@lang('register.mitra')</span><span class="red"> *</span>
                                            {!! Form::text('mitra', null, ['class' => 'form-control black text-bold-600 bg-grey font-small-3 bg-lighten-5 rounded-2', 'required', 'placeholder'=>__('register.mitra'), 'maxlength' => 255, 'maxlength' => 255]) !!}
                                        </div>
                                        <div class="form-group col-sm-4 mb-1">
                                            <span class="text-bold-700 ml-0-1 mb-0-1">@lang('register.penanggung_jawab')</span><span class="red"> *</span>
                                            {!! Form::text('penanggung_jawab', null, ['class' => 'form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>__('register.penanggung_jawab'), 'maxlength' => 255, 'maxlength' => 255]) !!}
                                        </div>
                                        <div class="form-group col-sm-12 mb-1">
                                            <span class="text-bold-700 ml-0-1 mb-0-1">@lang('register.alamat')</span><span class="red"> *</span>
                                            {!! Form::textarea('alamat', null, ['class' => 'form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>__('register.alamat'),'rows'=>4]) !!}
                                        </div>
                                        <div class="form-group col-sm-12 mb-1">
                                            <span class="text-bold-700 mb-0-1">File SHP </span>
                                            <x-media-library-attachment  name="file_shp" rules="mimes:zip,rar"/>
                                            <span class="secondary"><i>file optional</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card round box-shadow-1">
                                <div class="card-body">
                                    <div class="font-medium-2 text-bold-700 black mb-1"><i class="fa fa-pencil-square green"></i> @lang('register.lokasi_dan_jadwal')</div>
                                    <div class="row">
                                        <div class="form-group col-sm-4 mb-1">
                                            <span class="text-bold-700 mb-1">@lang('register.lokasi')</span><span class="red"> *</span>
                                            {!! Form::text('lokasi', null, ['class' => 'form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>__('register.lokasi')]) !!}
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <span class="text-bold-700 mb-1">@lang('register.provinsi')</span><span class="red"> *</span>
                                            {!! Form::select('provinsi_id',$provinsi, null, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2 ', 'required', 'placeholder'=>__('register.provinsi'),]) !!}
                                        </div>
                                        <div class="form-group col-sm-4 mb-1">
                                            <span class="text-bold-700 mb-1">Proponents</span><span class="red"> *</span>
                                            {!! Form::text('proponents', null, ['class' => 'form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>'Proponents..']) !!}
                                        </div>
                                        <!-- Mulai Kegiatan Field -->
                                        <div class="form-group col-sm-4">
                                            <span class="text-bold-700">@lang('register.mulai_kegiatan')</span><span class="red"> *</span>
                                            {!! Form::date('mulai_kegiatan', null, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2','id'=>__('register.mulai_kegiatan')]) !!}
                                        </div>

                                        <!-- Akhir Kegiatan Field -->
                                        <div class="form-group col-sm-4">
                                            <span class="text-bold-700">@lang('register.akhir_kegiatan')</span><span class="red"> *</span>
                                            {!! Form::date('akhir_kegiatan', null, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2','id'=>__('register.akhir_kegiatan')]) !!}
                                        </div>
                                        <!-- Lama Kegiatan Field -->
                                        <div class="form-group col-sm-4">
                                            <span class="text-bold-700">@lang('register.lama_kegiatan')</span><span class="red"> *</span>
                                            {!! Form::text('lama_kegiatan', null, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2', 'placeholder'=>__('register.lama_kegiatan'), 'required', 'maxlength' => 45, 'maxlength' => 45]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card round box-shadow-1 mb-2">
                                <div class="card-body">
                                    <div class="font-medium-2 text-bold-700 black mb-1"><i class="fa fa-pencil-square green"></i> @lang('register.jenis_pendanaan')</div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <span class="text-bold-700">@lang('register.pendanaan') (Rupiah)</span><span class="red"> *</span>
                                            {!! Form::text('pendanan_idr', null, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2', 'placeholder'=>__('register.pendanaan').' rupiah..' ,'oninput'=>"formatCurrencyInput(this)"]) !!}
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <span class="text-bold-700">@lang('register.pendanaan') (Dollar)</span><span class="red"> *</span>
                                            {!! Form::text('pendanaan_dollar', null, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2', 'placeholder'=>__('register.pendanaan').' dollar','oninput'=>"formatCurrencyInput(this)"]) !!}
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <span class="text-bold-700">@lang('register.sumber_dana_id')</span><span class="red"> *</span>
                                            {!! Form::text('sumber_dana_dn', null, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2', 'placeholder'=>__('register.sumber_dana_id')]) !!}
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <span class="text-bold-700">@lang('register.sumber_dana_luar')</span><span class="red"> *</span>
                                            {!! Form::text('sumber_dana_ln', null, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2', 'placeholder'=>__('register.sumber_dana_luar')]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card round box-shadow-1">
                                <div class="card-body">
                                    <div class="font-medium-2 text-bold-700 black mb-1"><i class="fa fa-pencil-square green"></i> Data Akun</div>
                                    <div class="row">
                                        <div class="form-group col-sm-6 mb-1">
                                            <span class="text-bold-700 mb-1">@lang('login.username')</span><span class="red"> *</span>
                                            {!! Form::text('username', null, ['class' => 'form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=> __('login.username')]) !!}
                                        </div>
                                        <div class="form-group col-sm-6 mb-1">
                                            <span class="text-bold-700 mb-1">@lang('login.nama_lengkap')</span><span class="red"> *</span>
                                            {!! Form::text('name', null, ['class' => 'form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>__('login.nama_lengkap')]) !!}
                                        </div>
                                        <div class="form-group col-sm-6 mb-1">
                                            <span class="text-bold-700 mb-1">Email</span><span class="red"> *</span>
                                            {!! Form::text('email', null, ['class' => 'form-control black  font-small-3 text-bold-600 bg-grey bg-lighten-5 rounded-2', 'required', 'placeholder'=>'email', 'maxlength' => 255, 'maxlength' => 255]) !!}
                                        </div>
                                        <div class="form-group col-sm-6 mb-1">
                                            <span class="text-bold-700 mb-1">Password</span><span class="red"> *</span>
                                            <input id="password" class="Password form-control black  font-small-3 text-bold-600 bg-grey bg-lighten-5 rounded-2" type="password" placeholder="@lang('login.konfirmasi_password')" name="password">
                                        </div>
                                        <div class="form-group col-sm-6 mb-1">
                                            <span class="text-bold-700 mb-1">@lang('login.konfirmasi_password')</span><span class="red"> *</span>
                                            <input id="password_confirmation" class="Password form-control black  font-small-3 text-bold-600 bg-grey bg-lighten-5 rounded-2" type="password" placeholder="@lang('login.konfirmasi_password')" name="password_confirmation">
                                        </div>
                                        <div class="form-group col-sm-3 mb-1">
                                            <span class="text-bold-700 mb-1 ">@lang('login.masukkan_kode_captcha')</span><span class="red"> *</span>
                                            <input type="text" class="form-control black text-bold-600 font-small-3 bg-grey bg-lighten-5 rounded-2 @error('captcha') is-invalid @enderror" autocomplete="off" name="captcha" placeholder="@lang('login.masukkan_kode_captcha')" >
                                        </div>
                                        <div class="form-group col-sm-3 mb-1 mt-1">
                                            <div class="d-flex">
                                                <span class="img-captha">{!! captcha_img('flat') !!}</span>
                                                <button type="button" class="btn btn-danger reload fs-1 w-100 ml-1 " id="reload">
                                                    &#x21bb;
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <footer class="footer">
                                <div class="form-group row mb-0">
                                    <div class="col-lg-6">
                                        <a href="{{ route('login') }}" class="btn btn-danger box-shadow-1 text-uppercase text-bold-600 btn-lighten-2 border-0 rounded-1 w-100">Batal</a>
                                    </div>
                                    <div class="col-lg-6">
                                        {!! Form::submit('Daftar', ['class' => 'btn btn-blue box-shadow-1 text-uppercase text-bold-600 rounded-1 w-100']) !!}
                                    </div>
                                </div>
                            </footer>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        function formatCurrencyInput(input) {
            let value = input.value.replace(/[^0-9]/g, '');
            value = parseInt(value, 10);
            input.value = isNaN(value) ? '' : value.toLocaleString('id-ID');
        }
    </script>
@endsection
