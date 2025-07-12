@extends('layouts.dashboard.dashboard')

@section('title','Edit Mata Kuliah')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Edit Mata Kuliah</h4>

                {{-- Error Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dashboard.datamaster.mata.kuliah.update', $mataKuliah->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        {{-- Kode Mata Kuliah --}}
                        <div class="col-md-6">
                            <label class="form-label">Kode Mata Kuliah</label>
                            <input type="text" 
                                   name="kode_mata_kuliah" 
                                   class="form-control" 
                                   value="{{ old('kode_mata_kuliah', $mataKuliah->kode_mata_kuliah) }}" 
                                   required>
                        </div>

                        {{-- Nama Mata Kuliah --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Mata Kuliah</label>
                            <input type="text" 
                                   name="nama_mata_kuliah" 
                                   class="form-control" 
                                   value="{{ old('nama_mata_kuliah', $mataKuliah->nama_mata_kuliah) }}" 
                                   required>
                        </div>

                        {{-- SKS Mata Kuliah --}}
                        <div class="col-md-6 mt-3">
                            <label class="form-label">SKS Mata Kuliah</label>
                            <input type="number" 
                                   name="sks_mata_kuliah" 
                                   class="form-control" 
                                   value="{{ old('sks_mata_kuliah', $mataKuliah->sks_mata_kuliah) }}" 
                                   required>
                        </div>

                        {{-- Prodi --}}
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Prodi</label>
                            <select name="id_prodi" class="form-control select2" required>
                                <option value="" disabled>-- Pilih Prodi --</option>
                                @foreach($prodi as $p)
                                    <option value="{{ $p->id_prodi }}"
                                        {{ old('id_prodi', $mataKuliah->id_prodi) == $p->id_prodi ? 'selected' : '' }}>
                                        {{ $p->nama_program_studi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="col-md-12 mt-4">
                            <a href="{{ route('dashboard.datamaster.mata.kuliah.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
