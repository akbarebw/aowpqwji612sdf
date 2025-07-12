@extends('layouts.dashboard.dashboard')

@section('title','Tambah Perkuliahan Mahasiswa')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Tambah Data Perkuliahan Mahasiswa</h4>
                <form action="{{ route('dashboard.datamaster.list.perkuliahan.mahasiswa.store') }}" method="post">
                    @csrf
                    <div class="row">
                        {{-- Prodi --}}
                        <div class="col-md-6">
                            <label class="form-label">Prodi</label>
                            {{ Form::select('prodi', $prodi, null, [ 'class'=>'form-control select2', 'placeholder' => 'Pilih Prodi']); }}
                            {{-- <select name="id_prodi" class="form-control select2">
                                <option value="" selected disabled>Pilih Prodi</option>
                                @foreach ($prodi as $pro)
                                    <option value="{{ $pro->id_prodi }}">{{ $pro->nama_program_studi }}</option>
                                @endforeach
                            </select> --}}
                        </div>

                        {{-- Pembiayaan --}}
                        <div class="col-md-6">
                            <label class="form-label">Pembiayaan</label>
                            <select name="id_pembiayaan" class="form-control select2">
                                <option value="" selected disabled>Pilih Pembiayaan</option>
                                @foreach ($pembiayaan as $item)
                                    <option value="{{ $item->id_pembiayaan }}">{{ $item->nama_pembiayaan }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Semester --}}
                        <div class="col-md-6">
                            <label class="form-label">Semester</label>
                            <select name="id_semester" class="form-control select2">
                                <option value="" selected disabled>Pilih Semester</option>
                                @foreach ($semester as $sem)
                                    <option value="{{ $sem->id_semester }}">{{ $sem->nama_semester }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- ID Registrasi Mahasiswa --}}
                        <div class="col-md-6">
                            <label class="form-label">ID Registrasi Mahasiswa</label>
                            <input type="text" name="id_registrasi_mahasiswa" class="form-control">
                        </div>

                        {{-- NIM --}}
                        <div class="col-md-6">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control">
                        </div>

                        {{-- Nama Mahasiswa --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Mahasiswa</label>
                            <input type="text" name="nama_mahasiswa" class="form-control">
                        </div>

                        {{-- Angkatan --}}
                        <div class="col-md-6">
                            <label class="form-label">Angkatan</label>
                            <input type="text" name="angkatan" class="form-control">
                        </div>

                        {{-- ID Periode Masuk --}}
                        <div class="col-md-6">
                            <label class="form-label">ID Periode Masuk</label>
                            <input type="text" name="id_periode_masuk" class="form-control">
                        </div>

                        {{-- Nama Semester --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Semester</label>
                            <input type="text" name="nama_semester" class="form-control">
                        </div>

                        {{-- ID Status Mahasiswa --}}
                        <div class="col-md-6">
                            <label class="form-label">ID Status Mahasiswa</label>
                            <input type="text" name="id_status_mahasiswa" class="form-control">
                        </div>

                        {{-- Nama Status Mahasiswa --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Status Mahasiswa</label>
                            <input type="text" name="nama_status_mahasiswa" class="form-control">
                        </div>

                        {{-- IPS --}}
                        <div class="col-md-6">
                            <label class="form-label">IPS</label>
                            <input type="number" step="0.01" name="ips" class="form-control">
                        </div>

                        {{-- IPK --}}
                        <div class="col-md-6">
                            <label class="form-label">IPK</label>
                            <input type="number" step="0.01" name="ipk" class="form-control">
                        </div>

                        {{-- SKS Semester --}}
                        <div class="col-md-6">
                            <label class="form-label">SKS Semester</label>
                            <input type="number" name="sks_semester" class="form-control">
                        </div>

                        {{-- SKS Total --}}
                        <div class="col-md-6">
                            <label class="form-label">SKS Total</label>
                            <input type="number" name="sks_total" class="form-control">
                        </div>

                        {{-- Biaya Kuliah Semester --}}
                        <div class="col-md-6">
                            <label class="form-label">Biaya Kuliah Semester</label>
                            <input type="number" name="biaya_kuliah_smtr" class="form-control">
                        </div>

                        {{-- Status Sync --}}
                        <div class="col-md-6">
                            <label class="form-label">Status Sync</label>
                            <select name="status_sync" class="form-control">
                                <option value="0">Belum Sync</option>
                                <option value="1">Sudah Sync</option>
                            </select>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="col-md-12 mt-3">
                            <a href="{{ route('dashboard.datamaster.list.perkuliahan.mahasiswa.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection