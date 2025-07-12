@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center bg-white round mt-30">
            <div class="col-md-7" style="margin-top: 5%">
                <div class="bs-callout-warning callout-border-left callout-bordered mt-4 p-1">
                    <strong>Verifikasi Email!</strong>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">Tautan verifikasi baru telah dikirim ke
                            Alamat email anda
                        </div>
                    @endif
                    <p>Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi. Jika Anda tidak belum menerima email, silahkan klik tombol kirim ulang dibawah.</p>
                </div>
                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-info block round btn-min-width mr-1 mb-1 mt-4">Kirim Ulang</button>
                </form>
            </div>
        </div>
    </div>
@endsection
