@extends('layouts.app')
@section('content')
<div id="user">
    @include('flash::message')
    <div class="content-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card box-shadow-1 rounded-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card-body text-center">
                                    @if(empty(Auth::user()->foto))
                                        <img src="{{ asset('master/app-assets/images/gallery/user_profil.png') }}" class="img-fluid rounded height-200">
                                    @else
                                        <img src="{{ asset(Auth::user()->foto) }}" alt="avatar" class="rounded-circle bg-grey bg-lighten-4 p-0-1 height-200 width-200 box-shadow-0-1" style="object-fit: cover;object-position: top;">
                                    @endif
                                    <div class="font-medium-1 text-bold-700 black mt-2">{{ Auth::user()['name'] }}</div>
                                    <div class="font-small-3 black">{{ Auth::user()->email }}</div>
                                    <a data-target="#editProfil" data-toggle="modal" href="javascript:void(0)"  class="btn btn-green btn-sm mt-2 round btn-glow">Ubah Profil</a>
                                    @include('users.modal.edit_profile')
                                    <p class="mb-0 mt-2"><i class="fa fa-refresh"></i> <i>Last Update {{ Carbon\Carbon::parse(Auth::user()['updated_at'])->format('d F Y - H:i:s') }}</i></p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card-body p-0">
                                    <table class="table black mb-0 font-small-4 table-responsive">
                                        <tr>
                                            <td colspan="3" class="p-1 border-top-0">
                                                <div class="font-medium-2 text-bold-800 black">Data Akun <i class="fa fa-check-circle green"></i></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-1">@lang('dashboard.nama_pengelola')</td>
                                            <td class="p-1">:</td>
                                            <td class="p-1">{{ Auth::user()['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-1">@lang('dashboard.username')</td>
                                            <td class="p-1">:</td>
                                            <td class="p-1">{{ Auth::user()['username'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-1">@lang('dashboard.no_telephone')</td>
                                            <td class="p-1">:</td>
                                            <td class="p-1">{{ Auth::user()['no_hp'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-1">@lang('dashboard.email')</td>
                                            <td class="p-1">:</td>
                                            <td class="p-1">{{ Auth::user()['email'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-1">@lang('dashboard.bergabung')</td>
                                            <td class="p-1">:</td>
                                            <td class="p-1">{{ Carbon\Carbon::parse(Auth::user()['created_at'])->format('d F Y') }}</td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <td class="p-1">@lang('dashboard.hak_akses')</td>--}}
{{--                                            <td class="p-1">:</td>--}}
{{--                                            <td class="p-1">--}}
{{--                                                @foreach(Auth::user()->roles as $item)--}}
{{--                                                    <span class="red text-bold-700">{!! $item->name !!} ({!! $item->desc !!}) </span>--}}
{{--                                                @endforeach--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            @livewire('create-unit')--}}
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        window.addEventListener('swal',function(e){
            Swal.fire(e.detail[0]);
            setTimeout(function(){
                location.reload();
            }, 3000)
        });
    </script>
@endsection

