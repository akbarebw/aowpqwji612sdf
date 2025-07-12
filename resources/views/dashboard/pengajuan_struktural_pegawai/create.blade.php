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
            <li class="breadcrumb-item"><a href="javascript:void(0);">Pengajuan Jabatan Fungsional</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Pegawai</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('dashboard.pengajuan-struktural-pegawai.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jabatan_diajukan" class="form-label fs-4">Jabatan Diajukan</label>
                                <select name="jabatan_diajukan" id="jabatan_diajukan" class="form-control select2" data-placeholder="Jabatan Diajukan">
                                    @foreach ($jabatanStrukturals as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == old('jabatan_diajukan') ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jabatan_diajukan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sk_pangkat_terakhir">Upload SK Pangkat Terakhir</label>
                                <input id="sk_pangkat_terakhir" placeholder="Upload SK Pangkat Terakhir" type="file" class="form-control" name="sk_pangkat_terakhir" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sk_jabatan_struktural">Upload SK Jabatan Struktural</label>
                                <input id="sk_jabatan_struktural" placeholder="Upload SK Jabatan Struktural" type="file" class="form-control" name="sk_jabatan_struktural" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="skp">Upload SKP</label>
                                <input id="skp" placeholder="Upload SKP" type="file" class="form-control" name="skp" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="ijazah_transkrip_terakhir">Upload Ijazah Transkrip Terakhir</label>
                                <input id="ijazah_transkrip_terakhir" placeholder="Upload Ijazah Transkrip Terakhir" type="file" class="form-control" name="ijazah_transkrip_terakhir" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="kartu_pegawai">Upload Kartu Pegawai</label>
                                <input id="kartu_pegawai" placeholder="Upload Kartu Pegawai" type="file" class="form-control" name="kartu_pegawai" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sk_cpns">Upload SK CPNS</label>
                                <input id="sk_cpns" placeholder="Upload SK CPNS" type="file" class="form-control" name="sk_cpns" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="surat_pengantar">Upload Surat Pengantar</label>
                                <input id="surat_pengantar" placeholder="Upload Surat Pengantar" type="file" class="form-control" name="surat_pengantar" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="dokumen_terkait">Upload Dokumen Terkait</label>
                                <input id="dokumen_terkait" placeholder="Upload Dokumen Terkait" type="file" class="form-control" name="dokumen_terkait" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="{{ route('dashboard.pengajuan-struktural-pegawai.index') }}" class="btn btn-danger light">Batal</a>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
