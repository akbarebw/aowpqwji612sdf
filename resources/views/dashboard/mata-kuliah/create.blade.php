@extends('layouts.dashboard.dashboard')

@section('title','Tambah Mata Kuliah')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Tambah Mata Kuliah</h4>
                <form action="{{ route('dashboard.datamaster.mata.kuliah.store') }}" method="post">
                    @csrf
                    <div class="row">
                        {{-- Kode Matkul --}}
                        <div class="col-md-6">
                            <label class="form-label">Kode Mata Kuliah</label>
                            <select name="id_mata_kuliah" class="form-control select2">
                                <option value="" selected disabled>Pilih Kode Mata Kuliah</option>
                                @foreach ($mata_kuliah as $mat)
                                    <option value="{{ $mat->id_matkul }}">{{ $mat->kode_mata_kuliah }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nama Mata Kuliah --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Mata Kuliah</label>
                            <select name="id_mata_kuliah" class="form-control select2">
                                <option value="" selected disabled>Pilih Mata Kuliah</option>
                                @foreach ($mata_kuliah as $mat)
                                    <option value="{{ $mat->id_matkul }}">{{ $mat->nama_mata_kuliah }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- SKS Mata Kuliah --}}
                        <div class="col-md-6">
                            <label class="form-label">SKS Mata Kuliah</label>
                            <input type="text" name="sks_mata_kuliah" class="form-control">
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

                        {{-- Tombol Aksi --}}
                        <div class="col-md-12 mt-3">
                            <a href="{{ route('dashboard.datamaster.mata.kuliah.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
