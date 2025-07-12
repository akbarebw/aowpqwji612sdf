@extends('layouts.dashboard.dashboard')
@section('title','pengajuan')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Rubah Pengajuan</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            
            <li class="breadcrumb-item"><a href="javascript:void(0);">Pengajuan</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Rubah Pengajuan</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.pengajuan.update', $pengajuan->id) }}" method="post"enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="SK Pangkat Terakhir">SK Pangkat Terakhir</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="file" value="{{ old('file', $pengajuan->file)}}">
									<div class="input-group-append">
										<a href="{{ asset('storage/pengajuan/' . $pengajuan->file) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>             
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="SK PNS">SK PNS</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="file" value="{{ old('file', $pengajuan->file)}}">
									<div class="input-group-append">
										<a href="{{ asset('storage/pengajuan/' . $pengajuan->file) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>             
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="DP3 / SKP (Penilaian Kerja)">DP3 / SKP (Penilaian Kerja)</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="file" value="{{ old('file', $pengajuan->file)}}">
									<div class="input-group-append">
										<a href="{{ asset('storage/pengajuan/' . $pengajuan->file) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>             
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard.pengajuan.index') }}" class="btn btn-danger light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
