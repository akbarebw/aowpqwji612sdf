@extends('layouts.dashboard.dashboard')

@section('title','Tambah Kurikulum')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Tambah Data Kurikulum</h4>
                <form action="{{ route('dashboard.datamaster.kurikulum.store') }}" method="post">
                    @csrf
                    <div class="row">
                       {{-- Kurikulum --}}
                       <div class="col-md-6">
                        <label class="form-label">Kurikulum</label>
                        <select name="id_kurikulum" class="form-control select2">
                            <option value="" selected disabled>Pilih Kurikulum</option>
                            @foreach ($kurikulum as $kur)
                                <option value="{{ $kur->id_kurikulum }}">{{ $kur->nama_kurikulum }}</option>
                            @endforeach
                        </select>
                    </div>
                       
                        {{-- Prodi --}}
                        <div class="col-md-6">
                            <label class="form-label">Prodi</label>
                            <select name="id_prodi" class="form-control select2">
                                <option value="" selected disabled>Pilih Prodi</option>
                                @foreach ($prodi as $pro)
                                    <option value="{{ $pro->id_prodi }}">{{ $pro->nama_program_studi }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jumlah SKS Lulus --}}
                        <div class="col-md-6">
                            <label class="form-label">Jumlah SKS Lulus</label>
                            <input type="text" name="jumlah_sks_lulus" class="form-control">
                        </div>

                        {{-- Jumlah SKS Wajib --}}
                        <div class="col-md-6">
                            <label class="form-label">Jumlah SKS Wajib</label>
                            <input type="text" name="jumlah_sks_wajib" class="form-control">
                        </div>

                        {{-- Jumlah SKS Pilihan --}}
                        <div class="col-md-6">
                            <label class="form-label">Jumlah SKS Pilihan</label>
                            <input type="text" name="jumlah_sks_pilihan" class="form-control">
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="col-md-12 mt-3">
                            <a href="{{ route('dashboard.datamaster.kurikulum.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
