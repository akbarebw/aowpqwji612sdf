@extends('layouts.dashboard.dashboard')
@section('title','Pengajuan Jabatan Fungsional Dosen')
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
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Dosen</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('dashboard.pengajuan-fungsional-dosen.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="ijazah_terakhir">Upload Ijazah Pendidikan Terakhir</label> <br>
                                <small class="text-danger">* Bagi ajuan Lektor Kepala, minimal Ijazah Magister atau Setara.</small> <br>
                                <small class="text-danger">* Bagi ajuan Guru Besar, minimal Ijazah Doktor atau Setara.</small>
                                <input id="ijazah_terakhir" placeholder="Upload Ijazah Terakhir" type="file" class="form-control" name="ijazah_terakhir" value="{{ old('ijazah_terakhir')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="akreditasi_prodi">Upload Akreditasi Prodi</label>
                                <input id="akreditasi_prodi" placeholder="Upload Akreditasi Prodi" type="file" class="form-control" name="akreditasi_prodi" value="{{ old('akreditasi_prodi')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="skp">Upload SKP</label>
                                <input id="skp" placeholder="Upload SKP" type="file" class="form-control" name="skp" value="{{ old('skp')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="bukti_bkd">Upload Bukti BKD</label>
                                <input id="bukti_bkd" placeholder="Upload Bukti BKD" type="file" class="form-control" name="bukti_bkd" value="{{ old('bukti_bkd')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="surat_pengantar">Upload Surat Pengantar</label>
                                <input id="surat_pengantar" placeholder="Upload Surat Pengantar" type="file" class="form-control" name="surat_pengantar" value="{{ old('surat_pengantar')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sk_pangkat">Upload SK Pangkat</label>
                                <input id="sk_pangkat" placeholder="Upload SK Pangkat" type="file" class="form-control" name="sk_pangkat" value="{{ old('sk_pangkat')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sk_jabatan">Upload SK Jabatan</label>
                                <input id="sk_jabatan" placeholder="Upload SK Jabatan" type="file" class="form-control" name="sk_jabatan" value="{{ old('sk_jabatan')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sertifikasi_dosen">Upload Sertifikasi Dosen</label>
                                <input id="sertifikasi_dosen" placeholder="Upload Sertifikasi Dosen" type="file" class="form-control" name="sertifikasi_dosen" value="{{ old('sertifikasi_dosen')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="{{ route('dashboard.pengajuan-fungsional-dosen.index') }}" class="btn btn-danger light">Batal</a>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
