@extends('layouts.dashboard.dashboard')
@section('title','pengajuan')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Tambah</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            
            <li class="breadcrumb-item"><a href="javascript:void(0);">Pengajuan</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Pegawai</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('dashboard.pengajuan.store')}}" method="post"enctype="multipart/form-data">
                    @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="file">Upload SK Pangkat Terakhir</label>
                                <input id="file" placeholder="Upload SK Pangkat Terakhir" type="file" class="form-control" name="sk_pangkat_terakhir" value="{{ old('file')}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="file">Upload SK PNS</label>
                                <input id="file" placeholder="Upload SK PNS" type="file" class="form-control" name="sk_pns" value="{{ old('file')}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="file">Upload DP3 / SKP (Penilaian Kerja)</label>
                                <input id="file" placeholder="Upload DP3 / SKP (Penilaian Kerja)" type="file" class="form-control" name="dp3_skp" value="{{ old('file')}}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="{{ route('dashboard.pengajuan.index') }}" class="btn btn-danger light">Batal</a>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
