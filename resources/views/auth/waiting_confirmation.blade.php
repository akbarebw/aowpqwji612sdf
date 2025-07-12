@extends('auth.layout_pendaftaran.app')

@section('content')
<div class="container">
    <div class="card bg-white round mt-5 mb-5" >
    @if($kegiatan->kegiatanHasStatus?->first()?->status_id == 5)

        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-10 row bg-white pb-5 rounded-1" style="margin-top: 8rem; margin-bottom: 8rem;">
                <div class="col-md-9 mb-2">
                    <div class="mb-10">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <i class="ft-file-text green font-large-3"></i>
                            </div>
                            <div class="ml-1 mt-0-1 mb-0-1">
                                <div class="text-bold-700 black font-medium-5">Form Perbaikan Data Umum</div>
                                <p class="mb-0 gray">Silahkan melakukan Perbaikan data umum <b>SISREDD+</b> dangan menggunakan data yang valid</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Perhatian!</strong> Data Umum yang ada laporkan perlu dilakukan perbaikan dengan catatan perbaikan berikut : <a href="#" class="alert-link">{{ $kegiatan->kegiatanHasStatus?->first()?->catatan }}</a>.
                    </div>
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    {!! Form::model($kegiatan, ['route' => ['perbaikanDataUmum', $kegiatan->id], 'method' => 'patch']) !!}
                    <div class="form-body">
                        <div class="card round box-shadow-1">
                            <div class="card-body">
                                <div class="font-medium-2 text-bold-700 black mb-1"><i class="fa fa-pencil-square green"></i> @lang('register.informasi_umum')</div>
                                <div class="row">
                                    <div class="form-group col-sm-12 mb-1">
                                        <span class="text-bold-700 mb-1">@lang('register.nama_kegiatan')</span><span class="red"> *</span>
                                        {!! Form::hidden('users_id', auth()->id()) !!}
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
                                        <x-media-library-collection :model="$kegiatan" collection="file_shp" name="file_shp" rules="mimes:zip,rar"/>
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
                                        {!! Form::date('mulai_kegiatan', $kegiatan->mulai_kegiatan, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2','id'=>__('register.mulai_kegiatan')]) !!}
                                    </div>

                                    <!-- Akhir Kegiatan Field -->
                                    <div class="form-group col-sm-4">
                                        <span class="text-bold-700">@lang('register.akhir_kegiatan')</span><span class="red"> *</span>
                                        {!! Form::date('akhir_kegiatan', $kegiatan->akhir_kegiatan, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2','id'=>__('register.akhir_kegiatan')]) !!}
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
                                        {!! Form::text('pendanan_idr', null, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2', 'placeholder'=>__('register.pendanaan').' rupiah..' ,'oninput'=>"formatCurrencyInput(this)",'id'=>'pendanaan_idr']) !!}
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <span class="text-bold-700">@lang('register.pendanaan') (Dollar)</span><span class="red"> *</span>
                                        {!! Form::text('pendanaan_dollar', null, ['class' => 'form-control font-small-3 black text-bold-600 bg-grey bg-lighten-5 rounded-2', 'placeholder'=>__('register.pendanaan').' dollar','oninput'=>"formatCurrencyInput(this)",'id'=>'pendanaan_dollar']) !!}
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

                        <footer class="footer">
                            <div class="form-group row mb-0">
                                <div class="col-lg-6">
                                    <a href="{{ route('beranda') }}" class="btn btn-danger box-shadow-1 text-uppercase text-bold-600 btn-lighten-2 border-0 rounded-1 w-100">Beranda</a>
                                </div>
                                <div class="col-lg-6">
                                    {!! Form::submit('Simpan Perbaikan', ['class' => 'btn btn-blue box-shadow-1 text-uppercase text-bold-600 rounded-1 w-100']) !!}
                                </div>
                            </div>
                        </footer>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @elseif($kegiatan->kegiatanHasStatus?->first()?->status_id == 4)
        <div class="row justify-content-center align-items-center mt-5 pt-5"  style="">
            <div class="col-md-4 align-items-center text-center">
                <h6>Hai, {{ auth()->user()->name }}</h6>
                <h3><strong>Akun Anda di Tolak</strong></h3>
                <p>Akun anda ditolak dengan alasan : {{ $kegiatan->kegiatanHasStatus?->first()?->catatan }}, Hal ini berdasarkan keputusan dari <b>Admin SISREDD+ KLHK</b></p>
                <div class="mt-3">
                    <a href="{{ route('beranda') }}" class="btn btn-black white block rounded-2 btn-min-width mr-1 mb-1">Beranda</a>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center align-items-center mt-5 pt-5"  style="">
            <div class="col-md-4 align-items-center text-center">
                <h6>Hai, {{ auth()->user()->name }}</h6>
                <h3><strong>Harap Menunggu Konfirmasi</strong></h3>
                <p>Akun anda sedang dalam proses verifikasi data umum, dimohon untuk menunggu konfirmasi dari <b>Admin SISREDD+ KLHK</b></p>
                <div class="mt-3">
                    <a href="{{ route('beranda') }}" class="btn btn-black white block rounded-2 btn-min-width mr-1 mb-1">Beranda</a>
                </div>
            </div>
        </div>
        <div class="card round overflow-hidden border-grey border-lighten-2 m-2">
            <div class="card-body pt-0">
                @if($kegiatan->kegiatanHasStatus->first()->status->kode == "ST01")
                    <div class="bg-green " style="width: 110px;height: 1rem; border-bottom-right-radius: 1rem;border-bottom-left-radius: 1rem"></div>
                @elseif($kegiatan->kegiatanHasStatus->first()->status->kode == "ST02")
                    <div class="bg-blue" style="width: 110px;height: 1rem;border-bottom-right-radius: 1rem;border-bottom-left-radius: 1rem"></div>
                @elseif($kegiatan->kegiatanHasStatus->first()->status->kode == "ST03")
                    <div class="bg-red " style="width: 110px;height: 1rem;border-bottom-right-radius: 1rem;border-bottom-left-radius: 1rem"></div>
                @elseif($kegiatan->kegiatanHasStatus->first()->status->kode == "ST04")
                    <div class="bg-warning " style="width: 110px;height: 1rem;border-bottom-right-radius: 1rem;border-bottom-left-radius: 1rem"></div>
                @elseif($kegiatan->kegiatanHasStatus->first()->status->kode == "ST05")
                    <div class="bg-grey " style="width: 110px;height: 1rem;border-bottom-right-radius: 1rem;border-bottom-left-radius: 1rem"></div>
                @endif

                <div class="mb-2 mt-2">
                    <span class="text-bold-500 black mr-0-1"><i class="ft-calendar pr-0-1"></i>{{ \Laraindo\TanggalFormat::DateIndo($kegiatan->created_at) }}</span>
                    <span class="font-medium-3 black">•</span>
                    <span class="@if($kegiatan->kegiatanHasStatus->first()->status->kode == "ST01")green
                 @elseif($kegiatan->kegiatanHasStatus->first()->status->kode == "ST02")blue
                 @elseif($kegiatan->kegiatanHasStatus->first()->status->kode == "ST03")red
                 @elseif($kegiatan->kegiatanHasStatus->first()->status->kode == "ST04")warning
                 @elseif($kegiatan->kegiatanHasStatus->first()->status->kode == "ST05")grey
                 @endif text-bold-700 ml-0-1 mr-0-1"><i class="fa fa-bookmark-o black pr-0-1"></i>{{ $kegiatan->kegiatanHasStatus->first()->status->name}}</span>
                    <span class="text-bold-800 black mr-0-1"><i class="ft-user pr-0-1"></i>{{ $kegiatan->users->name }}</span>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="form-group">
                            <span class="gray"><i class="ft-clipboard green pr-0-1"></i>Nama Kegiatan</span>
                            <p class="text-bold-700 black font-medium-1 mt-0-1 desc-p3">
                                <a href="#" class="black">{{ $kegiatan->nama_kegiatan }}</a>
                            </p>
                        </div>
                        <div class="form-group">
                            <span class="gray"><i class="ft-calendar green pr-0-1"></i>Jenis Kegiatan</span>
                            <p class="text-bold-500 black ml-2">
                                <span class="text-bold-800 red font-medium-5">{{ $kegiatan->jenis_kegiatan }}</span>
                            </p>
                        </div>


                        <div class="form-group">
                            <span class="gray"><i class="ft-clipboard green pr-0-1"></i>Informasi Pelaksana</span>
                            <div class="ml-2">
                                <div class="form-group row mb-0 black">
                                    <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Nama Pelaksana</label>
                                    <div class="col-lg-8 col-7 pl-0 d-flex">
                                        : <div class="pl-0-1 text-bold-700 black">{{ $kegiatan->nama_pelaksana }}</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 black">
                                    <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Penanggung Jawab</label>
                                    <div class="col-lg-8 col-7 pl-0 d-flex">
                                        : <div class="pl-0-1">{{ $kegiatan->penanggung_jawab }}</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 black">
                                    <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Mitra</label>
                                    <div class="col-lg-8 col-7 pl-0 d-flex">
                                        : <div class="pl-0-1">{{ $kegiatan->mitra }}</div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0 black">
                                    <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Jabatan</label>
                                    <div class="col-lg-8 col-7 pl-0 d-flex">
                                        : <div class="pl-0-1">{{ $kegiatan->jabatan_kegiatan }}</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 black">
                                    <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">No HP</label>
                                    <div class="col-lg-8 col-7 pl-0 d-flex">
                                        : <div class="pl-0-1">{{ $kegiatan->no_hp }}</div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0 black">
                                    <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Proponents</label>
                                    <div class="col-lg-8 col-7 pl-0 d-flex">
                                        : <div class="pl-0-1">{{ $kegiatan->proponents }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <span class="gray"><i class="ft-calendar green pr-0-1"></i>Jadwal Kegiatan</span>
                            <div class="ml-2">
                                <div class="form-group row mb-0 black">
                                    <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Lama Kegiatan</label>
                                    <div class="col-lg-8 col-7 pl-0 d-flex">
                                        : <div class="pl-0-1 text-bold-700 black">{{ $kegiatan->lama_kegiatan }}</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 black">
                                    <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Mulai Kegiatan</label>
                                    <div class="col-lg-8 col-7 pl-0 d-flex">
                                        : <div class="pl-0-1">{{ \Laraindo\TanggalFormat::DateIndo($kegiatan->mulai_kegiatan) }}</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 black">
                                    <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Akhir Kegiatan</label>
                                    <div class="col-lg-8 col-7 pl-0 d-flex">
                                        : <div class="pl-0-1">{{ \Laraindo\TanggalFormat::DateIndo($kegiatan->akhir_kegiatan) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="p-1 bg-white box-shadow-0-1 rounded-1 border-grey border-lighten-3">
                            <div class="form-group">
                                <span class="gray"><i class="ft-map-pin green pr-0-1"></i>Lokasi</span>
                                <div class="ml-2">
                                    <div class="form-group row mb-0 black">
                                        <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Provinsi</label>
                                        <div class="col-lg-8 col-7 pl-0 d-flex">
                                            : <div class="pl-0-1">{{ $kegiatan->provinsi->name }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 black">
                                        <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Alamat</label>
                                        <div class="col-lg-8 col-7 pl-0 d-flex">
                                            : <div class="pl-0-1">{{ $kegiatan->alamat }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="gray"><i class="ft-clipboard green pr-0-1"></i>Jenis &amp; Sumber Pendanaan</span>
                                <div class="ml-2">
                                    <div class="form-group row mb-0 black">
                                        <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Pendanaan (Rupiah)</label>
                                        <div class="col-lg-8 col-7 pl-0 d-flex">
                                            : <div class="pl-0-1">
                                                <span class="text-bold-700">{{\Laraindo\RupiahFormat::currency($kegiatan->pendanan_idr)}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 black">
                                        <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Pendanaan (Dollar)</label>
                                        <div class="col-lg-8 col-7 pl-0 d-flex">
                                            : <div class="pl-0-1 text-bold-700 black">{{ $kegiatan->pendanan_dollar }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 black">
                                        <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Pendanaan Dalam negeri</label>
                                        <div class="col-lg-8 col-7 pl-0 d-flex">
                                            : <div class="pl-0-1">{{ $kegiatan->sumber_dana_dn }}</div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0 black">
                                        <label class="col-lg-4 col-5 label-control black text-bold-600 mb-0 pr-0">Pendanaan Luar negeri</label>
                                        <div class="col-lg-8 col-7 pl-0 d-flex">
                                            : <div class="pl-0-1">{{ $kegiatan->sumber_dana_ln }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($kegiatan->kegiatanHasStatus->first()->status->kode == "ST04")
                    <div class="bs-callout-warning mt-1">
                        <div class="media align-items-stretch ">
                            <div class="media-left media-middle bg-warning p-2">
                                <i class="fa fa-warning white font-medium-5"></i>
                            </div>
                            <div class="media-body p-1 bg-warning bg-lighten-4">
                                <strong>CATATAN PERBAIKAN!</strong>
                                @can('approveKegiatan')
                                    <p >Kegiatan ini sedang dalam perbaikan data.</p>
                                @endcan
                                @can('kegiatans.edit')
                                    <p>{{$kegiatan->kegiatanHasStatus->first()->status->kegiatanStatuses->where('kegiatan_id',$kegiatan->id)->first()->catatan}}</p>
                                @endcan
                            </div>
                        </div>
                    </div>
                @elseif($kegiatan->kegiatanHasStatus->first()->status->kode == "ST03")
                    <div class="bs-callout-danger mt-1">
                        <div class="media align-items-stretch ">
                            <div class="media-left media-middle bg-danger p-2">
                                <i class="fa fa-times-circle white font-medium-5"></i>
                            </div>
                            <div class="media-body p-1 bg-danger bg-lighten-4">
                                <strong>KEGIATAN DITOLAK!</strong>
                                <p>{{$kegiatan->kegiatanHasStatus->first()->status->kegiatanStatuses->where('kegiatan_id',$kegiatan->id)->first()->catatan}}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
    </div>
</div>
@endsection
@section('scripts')
    <script>
        initializeInputs();
        function initializeInputs() {
            const ids = ['pendanaan_idr', 'pendanaan_dollar'];
            ids.forEach(id => {
                const input = document.querySelector(`#${id}`);
                if (input) {
                    formatCurrencyInput(input);
                }
            });
        }

        function formatCurrencyInput(input) {
            let value = input.value.replace(/[^0-9]/g, '');
            value = parseInt(value, 10);
            input.value = isNaN(value) ? '' : value.toLocaleString('id-ID');
        }
    </script>
@endsection
