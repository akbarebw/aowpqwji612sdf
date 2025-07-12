@extends('layouts.dashboard.dashboard')
@section('title','Pengajuan Jabatan Struktural Pegawai')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Ubah Pengajuan Jabatan Struktural Pegawai</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="javascript:void(0);">Pengajuan Jabatan Struktural Pegawai</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Ubah Pengajuan</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.pengajuan-struktural-pegawai.update', $pengajuan->id) }}" method="post"enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        {{-- Jabatan Struktural Diajukan --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jabatan_diajukan" class="form-label fs-4">Jabatan Diajukan</label>
                                <select name="jabatan_diajukan" id="jabatan_diajukan" class="form-control select2" data-placeholder="Jabatan Diajukan">
                                    @foreach ($jabatanStrukturals as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $pengajuan->jabatan_diajukan ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jabatan_diajukan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

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

                        {{-- SK Jabatan Struktural --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="SK Jabatan Struktural">SK Jabatan Struktural</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="sk_jabatan_struktural" value="{{ old('file', $pengajuan->sk_jabatan_struktural)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->sk_jabatan_struktural) }}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
                                        <a href="{{ asset('storage/' . $pengajuan->skp) }}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Ijazah Transkrip Terakhir --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Ijazah Transkrip Terakhir">Ijazah Transkrip Terakhir</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="ijazah_transkrip_terakhir" value="{{ old('file', $pengajuan->ijazah_transkrip_terakhir)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->ijazah_transkrip_terakhir) }}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Kartu Pegawai --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Kartu Pegawai">Kartu Pegawai</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="kartu_pegawai" value="{{ old('file', $pengajuan->kartu_pegawai)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->kartu_pegawai) }}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
                                        <a href="{{ asset('storage/' . $pengajuan->sk_cpns) }}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Surat Pengantar --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Surat Pengantar">Surat Pengantar</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="surat_pengantar" value="{{ old('file', $pengajuan->surat_pengantar)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->surat_pengantar) }}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Dokumen Terkait --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Dokumen Terkait">Dokumen Terkait</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="dokumen_terkait" value="{{ old('file', $pengajuan->dokumen_terkait)}}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->dokumen_terkait) }}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Submit button --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard.pengajuan-struktural-pegawai.index') }}" class="btn btn-danger light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
