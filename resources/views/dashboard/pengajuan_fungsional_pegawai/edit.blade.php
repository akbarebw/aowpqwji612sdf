@extends('layouts.dashboard.dashboard')
@section('title','pengajuan')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Ubah Pengajuan Jabatan Fungsional Pegawai</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="javascript:void(0);">Pengajuan Jabatan Fungsional Pegawai</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Ubah Pengajuan</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.pengajuan-fungsional-pegawai.update', $pengajuan->id) }}" method="post"enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- option pangkat golongan --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="golongan_diajukan">Pangkat Golongan</label>
                                <select class="form-control" name="golongan_diajukan" id="golongan_diajukan" required>
                                    <option value="">Pilih Pangkat Golongan</option>
                                    @foreach ($golongans as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $pengajuan->golongan_diajukan ? 'selected' : ''}}>{{ $item->kode_golongan . ' - ' . $item->nama_pangkat }}</option>
                                    @endforeach
                                </select>
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

                        {{-- Ijazah & Transkrip Terakhir --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Ijazah & Transkrip Terakhir">Ijazah & Transkrip Terakhir</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="ijazah_transkrip_terakhir" value="{{ old('file', $pengajuan->file)}}">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->ijazah_transkrip_terakhir) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- Penilaian Angka Kredit --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Penilaian Angka Kredit">Penilaian Angka Kredit</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="penilaian_angka_kredit" value="{{ old('file', $pengajuan->penilaian_angka_kredit)}}">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->penilaian_angka_kredit) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- DP3 / SKP (Penilaian Kerja) --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="DP3 / SKP (Penilaian Kerja)">DP3 / SKP (Penilaian Kerja)</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="dp3_skp" value="{{ old('file', $pengajuan->dp3_skp)}}">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->dp3_skp) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- Sertifikat Lulus Ujian Kompetensi --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Sertifikat Lulus Ujian Kompetensi">Sertifikat Lulus Ujian Kompetensi</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="sertifikat_lulus_ukom" value="{{ old('file', $pengajuan->sertifikat_lulus_ukom)}}">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->sertifikat_lulus_ukom) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- Sertifikat Diklat --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Sertifikat Diklat">Sertifikat Diklat</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="sertifikat_diklat" value="{{ old('file', $pengajuan->sertifikat_diklat)}}">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->sertifikat_diklat) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- Submit button --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard.pengajuan-fungsional-pegawai.index') }}" class="btn btn-danger light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
