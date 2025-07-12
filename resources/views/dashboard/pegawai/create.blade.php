@extends('layouts.dashboard.dashboard')
@section('title', 'Tambah')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Pegawai</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('dashboard.pegawai.store') }}" method="POST" enctype="multipart/form-data" id="addStaffForm">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <img src="{{ asset('asset_dashboard/images/profile/profile.png' ) }}" alt="" id="preview" class="img-fluid" style="width: 50%; border-radius: 10px; text-center">
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input id="foto" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror"  accept="image/*"
                                        onchange="previewImage(event)">
                                        @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input id="nama" name="nama" type="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input id="nip" name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip' ) }}">
                                        @error('nip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kontak">Kontak</label>
                                        <input id="kontak" name="kontak" type="text" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak' ) }}">
                                        @error('kontak')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input id="tempat_lahir" name="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir' ) }}">
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input id="mdate" name="tanggal_lahir" type="date"  class="form-control datepicker-default form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir' ) }}">

                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input id="umur" name="umur" type="number" class="form-control @error('umur') is-invalid @enderror" value="{{ old('umur' ) }}">
                                        @error('umur')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="id_agama">Agama</label>
                                <select id="id_agama" name="id_agama" class="form-control @error('id_agama') is-invalid @enderror">
                                    <option value="">Pilih Agama</option>
                                    @foreach ($agama as $item)
                                        <option value="{{ $item->id_agama }}" {{ old('id_agama') == $item->id_agama ? 'selected' : '' }}>{{ $item->nama_agama }}</option>
                                    @endforeach
                                </select>
                                @error('id_agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat' ) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kewaranegaraan">Kewarganegaraan</label>
                                <input id="kewaranegaraan" name="kewaranegaraan" type="text" class="form-control @error('kewaranegaraan') is-invalid @enderror" value="{{ old('kewaranegaraan' ) }}">
                                @error('kewaranegaraan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="status_perkawinan">Status Perkawinan</label>
                                <select id="status_perkawinan" name="status_perkawinan" class="form-control @error('status_perkawinan') is-invalid @enderror">
                                    <option value="">Pilih</option>
                                    <option value="Belum Menikah" {{ old('status_perkawinan') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                    <option value="Menikah" {{ old('status_perkawinan') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                    <option value="Cerai" {{ old('status_perkawinan') == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                                </select>
                                @error('status_perkawinan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kontak_darurat">Kontak Darurat</label>
                                <input id="kontak_darurat" name="kontak_darurat" type="text" class="form-control @error('kontak_darurat') is-invalid @enderror" value="{{ old('kontak_darurat' ) }}">
                                @error('kontak_darurat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jabatan_struktural_id">Jabatan Struktural</label>
                                <select name="jabatan_struktural_id[]" multiple id="jabatan_struktural" class="form-control select2" data-placeholder="Pilih Jabatan Struktural">
                                    @foreach ($jabatanStruktural as $item)
                                        <option value="{{ $item->id }}"
                                            {{ in_array($item->id, old('jabatan_struktural_id', [])) ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('jabatan_struktural_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jabatan_fungsional_id">Jabatan Fungsional</label>
                                <select name="jabatan_fungsional_id[]" multiple id="jabatan_fungsional" class="form-control select2" data-placeholder="Pilih Jabatan Fungsional">
                                    @foreach ($jabatanFungsional as $item)
                                        <option value="{{ $item->id }}"
                                            {{ in_array($item->id, old('jabatan_fungsional_id', [])) ? 'selected' : '' }}>
                                            {{ $item->nama_jabatan_fungsional }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jabatan_fungsional_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="status_pegawai_id">Status Kepegawaian</label>
                                <select name="status_pegawai_id[]" multiple id="status_pegawai_id" class="form-control select2" data-placeholder="Pilih Status Kepegawaian">
                                    @foreach ($statusPegawais as $item)
                                        <option value="{{ $item->id }}"
                                            {{ in_array($item->id, old('status_pegawai_id', [])) ? 'selected' : '' }}>
                                            {{ $item->nama_status_pegawai }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status_pegawai_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="aset_id">Aset</label>
                                <select name="aset_id[]" multiple id="aset_id" class="form-control select2" data-placeholder="Pilih Aset">
                                    @foreach ($asets as $item)
                                        <option value="{{ $item->id }}"
                                            {{ in_array($item->id, old('aset_id', [])) ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('aset_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pangkat_golongan_id">Pangkat Golongan</label>
                                <select name="pangkat_golongan_id" id="pangkat_golongan_id" class="form-control select2" data-placeholder="Pilih Pangkat Golongan">
                                    @foreach ($golongans as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == old('pangkat_golongan_id') ? 'selected' : '' }}>
                                            {{ $item->kode_golongan . ' - ' . $item->nama_pangkat }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pangkat_golongan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <option value="{{ $item->id }}"
                         @isset($pegawai)
                            {{ old('user_id', $pegawai->user_id) == $item->id ? 'selected' : '' }}
                         @else
                            {{ old('user_id') == $item->id ? 'selected' : '' }}
                         @endisset>
                            {{ $item->name }}
                        </option>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard.pegawai.index') }}" class="btn btn-danger light">Cancel</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('script')

<script>
    function previewImage(event) {
        const output = document.getElementById('preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                output.src = e.target.result;
                output.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            output.src = "{{ asset('asset_dashboard/images/profile/profile.png') }}";
            output.style.display = 'block';
        }
    }
</script>

@endpush
@endsection
