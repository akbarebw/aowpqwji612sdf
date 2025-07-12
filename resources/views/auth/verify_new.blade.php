@extends('auth.layout_pendaftaran.app')

@section('content')
<div class="container">
    <div class="card bg-white round" >
        <div class="row justify-content-center align-items-center"  style="height: 90vh;">
            <div class="col-md-4 align-items-center text-center">
                <h2><strong>Harap Konfirmasi Akun Anda</strong></h2>
                <p>Silahkan periksan email anda dan klik link untuk melakukan konfirmasi, Setelah dikonfirmasi akun anda akan aktif</p>
                @if (session('resend'))
                    <div class="alert alert-success mt-2" role="alert">Tautan verifikasi baru telah dikirim ke
                        Alamat email anda
                    </div>
                @endif
                <form class="mt-3" action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <span class="text-gray-700">Tidak Menerima email?</span>
                    <button type="submit" class="btn btn-black white block rounded-2 btn-min-width mr-1 mb-1">Kirim Ulang</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
