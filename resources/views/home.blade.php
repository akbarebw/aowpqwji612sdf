@extends('layouts.app')

@section('content')
        <section class="page-section-pt pb-80">
            <div class="col-lg-12 mb-3 row pr-0">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
                    <div class="font-medium-5 text-bold-700 black">Dashboad SISREDD+</div>
                    <div><a href="" class="green darken-4">Beranda</a> / Dashboard</div>
                </div>
            </div>
        </section>

        <section class="page-section-pt pb-80">
            <div class="col-xl-12 col-12">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-6">
                        <div class="card bg-green bg-darken-4 rounded-1">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media row pt-0-1 pb-0-1">
                                        <div class="align-self-center col-lg-4 col-12">
                                            <i class="ft-bookmark white font-large-1 background-round bg-green bg-darken-3 float-left p-0.5"></i>
                                        </div>
                                        <div class="media-body text-black text-left col-lg-8 col-12">
                                            <h1 class="white text-bold-700 mb-0">{{$semuaKegiatan}}</h1>
                                            <span class="text-bold-600 font-small-3 white text-uppercase">@if(auth()->user()->hasRole('ADM')) Semua Aksi @else "Aksi Sendiri" @endif</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-6">
                        <div class="card bg-white rounded-1">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media row pt-0-1 pb-0-1">
                                        <div class="align-self-center col-lg-4 col-12">
                                            <i class="ft-check-circle success font-large-1 background-round bg-success bg-lighten-5 float-left p-0.5"></i>
                                        </div>
                                        <div class="media-body text-black text-left col-lg-8 col-12">
                                            <h1 class="black text-bold-700 mb-0">{{$kegiatanDiterima}}</h1>
                                            <span class="text-bold-600 font-small-3 blue-grey lighten-1 text-uppercase">Aksi Diterima</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-6">
                        <div class="card bg-white rounded-1">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media row pt-0-1 pb-0-1">
                                        <div class="align-self-center col-lg-4 col-12">
                                            <i class="ft-clock warning font-large-1 background-round bg-warning bg-lighten-5 float-left p-0.5"></i>
                                        </div>
                                        <div class="media-body text-black text-left col-lg-8 col-12">
                                            <h1 class="black text-bold-700 mb-0">{{$kegiatanDiproses}}</h1>
                                            <span class="text-bold-600 font-small-3 blue-grey lighten-1 text-uppercase">Aksi Diproses</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(auth()->user()->hasRole('ADM'))
                        <div class="col-xl-3 col-lg-6 col-6">
                        <div class="card bg-white rounded-1">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media row pt-0-1 pb-0-1">
                                        <div class="align-self-center col-lg-4 col-12">
                                            <i class="ft-users green font-large-1 background-round bg-green bg-lighten-5 float-left p-0.5"></i>
                                        </div>
                                        <div class="media-body text-black text-left col-lg-8 col-12">
                                            <h1 class="black text-bold-700 mb-0">{{$semuaPengguna}}</h1>
                                            <span class="text-bold-600 font-small-2 blue-grey lighten-1 text-uppercase">Total Pengguna</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="col-xl-3 col-lg-6 col-6">
                            <div class="card bg-white rounded-1">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media row pt-0-1 pb-0-1">
                                            <div class="align-self-center col-lg-4 col-12">
                                                <i class="ft-x-circle danger font-large-1 background-round bg-danger bg-lighten-5 float-left p-0.5"></i>
                                            </div>
                                            <div class="media-body text-black text-left col-lg-8 col-12">
                                                <h1 class="black text-bold-700 mb-0">{{$kegiatanDitolak}}</h1>
                                                <span class="text-bold-600 font-small-2 blue-grey lighten-1 text-uppercase">Aksi Ditolak</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="page-section-pt pb-80">
            <div class="row">
                <div class="col-md-9">
                    <div class="card rounded-1 box-shadow-0">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-xl-12 mb-2">
                                    <div class="media d-flex mb-1">
                                        <div class="align-self-center">
                                            <i class="ft-server blue font-medium-3 background-round bg-blue bg-lighten-5 float-left p-1"></i>
                                        </div>
                                        <div class="media-body text-left ml-1">
                                            <span class="font-medium-3 black text-bold-800">Instant Menu</span>
                                            <p class="font-small-4 mb-0 grey">Akses menu cepat</p>
                                        </div>
                                    </div>
                                </div>

                                @can('approveKegiatan')
                                    <div class="col-xl-6 col-lg-6 col-md-3 col-12">
                                        <div class="card">
                                            <div class="{{ $userWaitingVerified?'bg-warning':'bg-grey' }} bg-lighten-4 rounded-1 p-1 text-center" data-toggle="popover" data-content="Tahap pengisian ini dapat anda abaikan jika tidak ingin untuk melampirkan peta area kegiatan." data-trigger="hover" data-original-title="Peta Unit" data-placement="top">
                                                <img class="m-1 p-0-1 bg-white rounded-circle" style="height: 70px; width: 70px" src="{{asset('image/verifikasi.jpg')}}">
                                                <div class="green darken-3 font-small-4 font"><strong>VERIFIKASI USER BARU</strong></div>
                                                <p class="green darken-3 font-small-4" ><b>{{ $userWaitingVerified }}</b> Menunggu Diverifikasi</p>
                                                <a href="{{ route('kegiatans.index').'?status=ST02' }}"  class="btn btn-sm {{ $userWaitingVerified?'btn-warning':'btn-blue' }} round text-bold-700 mt-1 mb-1 font-small-2 text-uppercase" style="padding-left: 0.2rem"><i class="ft-star green font-small-2 background-round bg-blue bg-lighten-5 p-0-1 mr-0-1"></i>VERIFIKASI</a>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('approveKegiatan')
                                    <div class="col-xl-6 col-lg-6 col-md-3 col-12">
                                        <div class="card">
                                            <div class="bg-green bg-lighten-5 rounded-1 p-1 text-center" data-toggle="popover" data-content="Tahap pengisian ini dapat anda abaikan jika tidak ingin untuk melampirkan peta area kegiatan." data-trigger="hover" data-original-title="Peta Unit" data-placement="top">
                                                <img class="m-1 p-0-1 bg-white rounded-circle" style="height: 70px; width: 70px" src="{{asset('image/verifikasi.jpg')}}">
                                                <div class="green darken-3 font-small-4"><strong>VERIFIKASI KEGIATAN</strong></div>
                                                <p class="green darken-3 font-small-4"><b>0</b> Menunggu Diverifikasi</p>
                                                <a href="{{ route('kegiatans.index') }}" class="btn btn-sm btn-green round text-bold-700 mt-1 mb-1 font-small-2 text-uppercase {{ Request::is('kegiatans') ? 'active' : '' }}" style="padding-left: 0.2rem"><i class="ft-star green font-small-2 background-round bg-blue bg-lighten-5 p-0-1 mr-0-1"></i>VERIFIKASI</a>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('kegiatans.create')
                                    <div class="col-xl-6 col-lg-6 col-md-3 col-12">
                                        <div class="card">
                                            <div class="bg-grey bg-lighten-5 rounded-1 p-1 text-center">
                                                <svg  xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                                      width="70" height="70" x="0" y="0" viewBox="0 0 24 24"
                                                      style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                      class="m-1 p-0-1 bg-white rounded-circle"><g><g fill-rule="evenodd" clip-rule="evenodd"><path fill="#ED5001" d="M7.216 16.003a.75.75 0 0 1-.594-1.207l2.993-3.89a.75.75 0 0 1 1.058-.132l2.82 2.215 2.467-3.183a.75.75 0 1 1 1.186.918l-2.93 3.78a.746.746 0 0 1-.5.285.741.741 0 0 1-.556-.154l-2.818-2.214-2.53 3.289a.75.75 0 0 1-.596.293zM19.967 3.5a1.173 1.173 0 0 0 0 2.345 1.173 1.173 0 0 0 0-2.345zm0 3.845c-1.473 0-2.672-1.199-2.672-2.673S18.495 2 19.967 2c1.474 0 2.672 1.198 2.672 2.672s-1.198 2.673-2.672 2.673z" opacity="1" data-original="#999999" class=""></path><path fill="#383312" d="M16.233 22.703H7.629C4.262 22.703 2 20.338 2 16.818V8.736c0-3.525 2.262-5.894 5.629-5.894h7.268a.75.75 0 0 1 0 1.5H7.629C5.121 4.342 3.5 6.066 3.5 8.736v8.082c0 2.705 1.582 4.385 4.129 4.385h8.604c2.508 0 4.129-1.72 4.129-4.385V9.78a.75.75 0 0 1 1.5 0v7.04c0 3.52-2.262 5.884-5.629 5.884z" opacity="1" data-original="#000000" class=""></path></g></g></svg>
                                                <div class="black font-small-4"><strong>KEGIATAN</strong></div>
                                                <p class="green darken-3 font-small-4"><b>0</b> Kegiatan Periode Sekarang</p>
                                                <a href="{{ route('kegiatans.create') }}"  class="btn btn-sm btn-blue round text-bold-700 mt-1 mb-1 font-small-2 {{ Request::is('kegiatans/create') ? 'active' : '' }}" style="padding-left: 0.2rem"><i class="ft-plus-circle blue font-small-2 background-round bg-blue bg-lighten-5 p-0-1 mr-0-1"></i>TAMBAH KEGIATAN</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-3 col-12">
                                        <div class="card">
                                            <div class="bg-grey bg-lighten-5 rounded-1 p-1 text-center">
                                                <img class="m-1 p-0-1 bg-white rounded-circle" style="height: 70px; width: 70px" src="{{asset('image/forest.png')}}">
                                                <div class="black font-small-4"><strong>SAFEGUARD</strong></div>
                                                <p class="black font-small-4 text-capitalize">7 Prinsip Safeguard</p>
                                                <a href="#" class="btn btn-sm btn-blue round text-bold-700 mt-1 mb-1 font-small-2 text-uppercase" style="padding-left: 0.2rem"><i class="ft-eye blue font-small-2 background-round bg-blue bg-lighten-5 p-0-1 mr-0-1"></i>LIHAT</a>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('pm.index')
                                    <div class="col-xl-6 col-lg-6 col-md-3 col-12">
                                        <div class="card">
                                            <div class="bg-green bg-lighten-5 rounded-1 p-1 text-center" data-toggle="popover" data-content="Tahap pengisian ini dapat anda abaikan jika tidak ingin untuk melampirkan peta area kegiatan." data-trigger="hover" data-original-title="Peta Unit" data-placement="top">
                                                <img class="m-1 p-0-1 bg-white rounded-circle" style="height: 70px; width: 70px" src="{{asset('image/verifikasi.jpg')}}">
                                                <div class="green darken-3 font-small-4"><strong>LAPORAN KEGIATAN</strong></div>
                                                <p class="green darken-3 font-small-4"><b>0</b> Telah Dilaporkan</p>
                                                <a href="{{ route('kegiatans.index') }}" class="btn btn-sm btn-green round text-bold-700 mt-1 mb-1 font-small-2 text-uppercase {{ Request::is('kegiatans') ? 'active' : '' }}" style="padding-left: 0.2rem"><i class="ft-eye green font-small-2 background-round bg-blue bg-lighten-5 p-0-1 mr-0-1"></i>LIHAT</a>
                                            </div>
                                        </div>
                                    </div>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card rounded-1">
                        <div class="card-body">
                            <div class="font-small-4 black text-bold-700 mb-2 justify-content-center align-content-center">
                                <i class="fa fa-user-circle green font-medium-4 background-round bg-green bg-lighten-5 float-left p-0-3 mr-0-1"></i>
                                <span class="text-uppercase">Informasi</span>
                                <p class="font-small-3 blue-grey lighten-1 text-bold-500">Data Penanggung Jawab</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="text-center bg-transparent bg-lighten-5 p-1 border-top-grey border-top-lighten-3">
{{--                                        <span hidden="">{"id":407,"instansi_id":null,"parent_unit_id":61,"nama":"Desa Contoh A","alamat":"jalan ikhlas desa A, kutai timur","no_telp":"05123453333","created_at":"2021-10-28T03:26:27.000000Z","updated_at":"2024-05-17T12:47:39.000000Z","deleted_at":null,"unit_type_id":4,"tujuan_umum":null,"tujuan_khusus":null,"left":73,"right":74,"slug":"desa-contoh-a","file_shp":null,"status_shp":null,"kabkota_id":null,"type_penerima_manfaat_id":null}</span>--}}
                                        <div class="text-muted black text-bold-700 mb-0-1">PROGRAMMER SISREDD+</div>
                                        <div class="text-muted black text-bold-500"></div>
                                        <div class="text-muted black text-bold-500"></div>
                                        <div class="text-muted black text-bold-500">085388124352</div>
                                        <div class="text-muted black text-bold-500 mb-1">admin@gmail.com</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        {{--<section class="page-section-pt pb-80 mb-2">
            <div class="card-content ">
                <div class="card-body  bg-white rounded-1">
                    <div class="row">
                        <div class="col-9">
                            <h3 class="text-black text-capitalize font-weight-800">Kegiatan Tebaru</h3>
                            <h6 class="font-weight-400 l-height-28">Data kegiatan dibawah adalah data terbaru yang di inputkan semua user di seluruh wilayah Indonesia<br></h6>
                        </div>
                        @can("laporkanAksi.create")
                            <div class="col-3 text-right">
                                <a href="{{ route('laporkanAksi')}}" class="btn bg-green bg-darken-4 text-white">Laporkan Aksi <i class="fa fa-plus"></i></a>
                            </div>
                        @endcan
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-green white">
                            <tr>
                                <th>Informasi Kegiatan</th>
                                <th>Provinsi</th>
                                <th>Jenis Kegiatan</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kegiatan as $item)
                                <tr>
                                    <td>
                                        <p><span><b>Nama Kegiatan :</b></span> {{$item->nama_kegiatan}}</p>
                                        <p><span><b>Penanggung Jawab :</b></span> {{$item->penanggung_jawab}}</p>
                                        <p><span><b>Mitra :</b></span> {{$item->mitra}}</p>
                                        <p><span><b>Lama Kegiatan :</b></span> {{$item->lama_kegiatan}}</p>
                                        <p><span><b>Mulai Kegiatan :</b></span> {{$item->mulai_kegiatan}}</p>
                                        <p><span><b>Akhir Kegiatan :</b></span> {{$item->akhir_kegiatan}}</p>
                                    </td>
                                    <td>{{$item->provinsi->name}}</td>
                                    <td>{{$item->jenis_kegiatan}}</td>
                                    <td class="align-content-center">
                                        <a href="{{ route('detailAksi', [$item->id]) }}"
                                           class='btn bg-green bg-darken-4 btn-sm btn-round text-white'>
                                            <i class="fa fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>--}}


        <section class="page-section-pt pb-80 mb-2">
            <div class="card-content ">
                <div class="card-body  bg-white rounded-1">
                    <div class="row justify-content-center mt-40">
                        <div class="col-lg-12">
                            <h3 class="text-black text-capitalize font-weight-800">Peta Pelaksanaan <span class="text-green">REDD+</span> Indonesia</h3>
                            <p class="text-brown font-medium-3">Data terhitung dari keseluruhan <span class="font-weight-800 text-orange">waktu pelaporan</span> di seluruh wilayah <br></p>

                            <iframe title="Peta Pelaksana REDD+" aria-label="Map" id="datawrapper-chart-lnjUc" src="https://datawrapper.dwcdn.net/lnjUc/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="526" data-external="1"></iframe>
                            <script type="text/javascript">
                                !function(){
                                    "use strict";window.addEventListener("message",(function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r=0;r<e.length;r++)if(e[r].contentWindow===a.source){var i=a.data["datawrapper-height"][t]+"px";e[r].style.height=i}}}))}();
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@section('scripts')
    <script>
        function sendEventKegiatan(element) {
            element.href = '{{ route('kegiatans.index') }}';
        }
    </script>
@endsection
