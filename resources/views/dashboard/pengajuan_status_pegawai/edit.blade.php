@extends('layouts.dashboard.dashboard')
@section('title','pengajuan')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Ubah Pengajuan Status Pegawai</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="javascript:void(0);">Pengajuan Status Pegawai</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Ubah Pengajuan</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.pengajuan-status-pegawai.update', $pengajuan->id) }}" method="post"enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- SK Pangkat Terakhir --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="SK Pangkat Terakhir">SK Pangkat Terakhir</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="sk_pangkat_terakhir" value="{{ old('file', $pengajuan->sk_pangkat_terakhir)}}">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->sk_pangkat_terakhir) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- SK CPNS --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="SK CPNS">SK CPNS</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="sk_cpns" value="{{ old('file', $pengajuan->sk_cpns)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->sk_cpns) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- SK Mutasi --}}
                        <div class="col-sm-12">
                            <div class="form-group  ">
                                <label class="form-label fs-4" for="SK Mutasi">SK Mutasi</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="sk_mutasi" value="{{ old('file', $pengajuan->sk_mutasi)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->sk_mutasi) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Ijazah --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Ijazah">Ijazah & Transkrip Terakhir</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="ijazah_transkrip_terakhir" value="{{ old('file', $pengajuan->ijazah_transkrip_terakhir)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->ijazah_transkrip_terakhir) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- SKP --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="SKP">SKP</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="skp" value="{{ old('file', $pengajuan->skp)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->skp) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Submit button --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard.pengajuan-status-pegawai.index') }}" class="btn btn-danger light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
