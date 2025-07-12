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
                <form action="{{route('dashboard.pengajuan-fungsional-pegawai.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                        {{-- option pangkat golongan --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="golongan_diajukan">Pangkat Golongan Diajukan</label>
                                <select class="form-control" name="golongan_diajukan" id="golongan_diajukan" required>
                                    <option value="">Pilih Pangkat Golongan</option>
                                    @foreach ($golongans as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode_golongan . ' - ' . $item->nama_pangkat }}</option>
                                    @endforeach
                                </select>
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
                                <label class="form-label fs-4" for="ijazah_transkrip_terakhir">Ijazah & Transkrip Terakhir</label>
                                <input id="ijazah_transkrip_terakhir" placeholder="Upload SK Pangkat Terakhir" type="file" class="form-control" name="ijazah_transkrip_terakhir" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="penilaian_angka_kredit">Penilaian Angka Kredit</label>
                                <input id="penilaian_angka_kredit" placeholder="Upload SK Pangkat Terakhir" type="file" class="form-control" name="penilaian_angka_kredit" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="dp3_skp">Upload DP3 / SKP (Penilaian Kerja)</label>
                                <input id="dp3_skp" placeholder="Upload DP3 / SKP (Penilaian Kerja)" type="file" class="form-control" name="dp3_skp" value="{{ old('file')}}" required accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sertifikat_lulus_ukom">Sertifikat Lulus Ujian Kompetensi</label>
                                <input id="sertifikat_lulus_ukom" placeholder="Upload Sertifikat Lulus Ujian Kompetensi (Opsional)" type="file" class="form-control" name="sertifikat_lulus_ukom" value="{{ old('file')}}" accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sertifikat_diklat">Sertifikat Diklat</label>
                                <input id="sertifikat_diklat" placeholder="Upload Sertifikat Diklat (Opsional)" type="file" class="form-control" name="sertifikat_diklat" value="{{ old('file')}}" accept="image/*,application/pdf">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="{{ route('dashboard.pengajuan-fungsional-pegawai.index') }}" class="btn btn-danger light">Batal</a>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
