@extends('layouts.dashboard.dashboard')
@section('title','pengajuan')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Ubah Pengajuan Jabatan Fungsional Dosen</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="javascript:void(0);">Pengajuan Jabatan Fungsional Dosen</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Ubah Pengajuan</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.pengajuan-fungsional-dosen.update', $pengajuan->id) }}" method="post"enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- Ijazah Terakhir --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Ijazah Terakhir">Ijazah Terakhir</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Ijazah Terakhir" type="file" class="form-control" name="ijazah_terakhir" value="{{ old('file', $pengajuan->ijazah_terakhir)}}">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->ijazah_terakhir) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- Akreditasi Prodi --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Akreditasi Prodi">Akreditasi Prodi</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Akreditasi Prodi" type="file" class="form-control" name="akreditasi_prodi" value="{{ old('file', $pengajuan->akreditasi_prodi)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->akreditasi_prodi) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SKP --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="SKP">SKP</label>
                                <div class="input-group">
                                    <input id="file" placeholder="SKP" type="file" class="form-control" name="skp" value="{{ old('file', $pengajuan->skp)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->skp) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bukti BKD --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Bukti BKD">Bukti BKD</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Bukti BKD" type="file" class="form-control" name="bukti_bkd" value="{{ old('file', $pengajuan->bukti_bkd)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->bukti_bkd) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Surat Pengantar --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Surat Pengantar">Surat Pengantar</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Surat Pengantar" type="file" class="form-control" name="surat_pengantar" value="{{ old('file', $pengajuan->surat_pengantar)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->surat_pengantar) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SK Pangkat --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="SK Pangkat">SK Pangkat</label>
                                <div class="input-group">
                                    <input id="file" placeholder="SK Pangkat" type="file" class="form-control" name="sk_pangkat" value="{{ old('file', $pengajuan->sk_pangkat)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->sk_pangkat) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SK Jabatan --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="SK Jabatan">SK Jabatan</label>
                                <div class="input-group">
                                    <input id="file" placeholder="SK Jabatan" type="file" class="form-control" name="sk_jabatan" value="{{ old('file', $pengajuan->sk_jabatan)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->sk_jabatan) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Sertifikasi Dosen --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Sertifikasi Dosen">Sertifikasi Dosen</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Sertifikasi Dosen" type="file" class="form-control" name="sertifikasi_dosen" value="{{ old('file', $pengajuan->sertifikasi_dosen)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->sertifikasi_dosen) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Submit button --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard.pengajuan-fungsional-dosen.index') }}" class="btn btn-danger light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
