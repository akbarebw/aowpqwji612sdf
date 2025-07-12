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

            <li class="breadcrumb-item"><a href="javascript:void(0);">Pengajuan Status</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Pegawai</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('dashboard.pengajuan-status-pegawai.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sk_pangkat_terakhir">Upload SK Pangkat Terakhir</label>
                                <input id="sk_pangkat_terakhir" placeholder="Upload SK Pangkat Terakhir" type="file" class="form-control" name="sk_pangkat_terakhir" value="{{ old('sk_pangkat_terakhir')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>

                        {{-- SK CPNS --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sk_cpns">Upload SK CPNS / PNS</label>
                                <input id="sk_cpns" placeholder="Upload SK CPNS / PNS" type="file" class="form-control" name="sk_cpns" value="{{ old('sk_cpns')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        {{-- SK Mutasi --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sk_mutasi">Upload SK Mutasi</label>
                                <input id="sk_mutasi" placeholder="Upload SK Mutasi" type="file" class="form-control" name="sk_mutasi" value="{{ old('sk_mutasi')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        {{-- Ijazah --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="ijazah">Upload Ijazah & Transkrip Nilai</label>
                                <input id="ijazah" placeholder="Upload Ijazah & Transkrip Nilai" type="file" class="form-control" name="ijazah_transkrip_terakhir" value="{{ old('ijazah_transkrip_terakhir')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        {{-- SKP --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="skp">Upload SKP 2 Tahun Terakhir</label>
                                <input id="skp" placeholder="Upload SKP 2 Tahun Terakhir" type="file" class="form-control" name="skp" value="{{ old('skp')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="{{ route('dashboard.pengajuan-status-pegawai.index') }}" class="btn btn-danger light">Batal</a>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
