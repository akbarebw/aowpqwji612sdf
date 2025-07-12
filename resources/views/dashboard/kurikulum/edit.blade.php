@extends('layouts.dashboard.dashboard')

@section('title','Edit Kurikulum')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Edit Data Kurikulum</h4>
                <form action="{{ route('dashboard.datamaster.kurikulum.update', $kurikulum->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- ID Kurikulum --}}
                        <div class="col-md-6">
                            <label class="form-label">Kurikulum</label>
                            <select name="id_kurikulum" class="form-control select2">
                                <option value="" disabled>Pilih Kurikulum</option>
                                <option value="{{ $kurikulum->id_kurikulum }}" selected>{{ $kurikulum->nama_kurikulum }}</option>
                            </select>
                        </div>

                        {{-- Prodi --}}
                        <div class="col-md-6">
                            <label class="form-label">Prodi</label>
                            <select name="id_prodi" class="form-control select2">
                                <option value="" disabled>Pilih Prodi</option>
                                @foreach ($prodi as $pro)
                                    <option value="{{ $pro->id_prodi }}" {{ $kurikulum->id_prodi == $pro->id_prodi ? 'selected' : '' }}>
                                        {{ $pro->nama_program_studi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jumlah SKS Lulus --}}
                        <div class="col-md-6">
                            <label class="form-label">Jumlah SKS Lulus</label>
                            <input type="text" name="jumlah_sks_lulus" class="form-control" value="{{ $kurikulum->jumlah_sks_lulus }}">
                        </div>

                        {{-- Jumlah SKS Wajib --}}
                        <div class="col-md-6">
                            <label class="form-label">Jumlah SKS Wajib</label>
                            <input type="text" name="jumlah_sks_wajib" class="form-control" value="{{ $kurikulum->jumlah_sks_wajib }}">
                        </div>

                        {{-- Jumlah SKS Pilihan --}}
                        <div class="col-md-6">
                            <label class="form-label">Jumlah SKS Pilihan</label>
                            <input type="text" name="jumlah_sks_pilihan" class="form-control" value="{{ $kurikulum->jumlah_sks_pilihan }}">
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="col-md-12 mt-3">
                            <a href="{{ route('dashboard.datamaster.kurikulum.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
