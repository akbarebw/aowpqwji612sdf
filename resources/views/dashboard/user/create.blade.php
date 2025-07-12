@extends('layouts.dashboard.dashboard')
@section('title','Tambah Pengguna')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Pengguna</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('user') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboard.datamaster.user.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="option_create" class="form-label">Opsi Pembuatan</label>
                                            <select name="option_create" id="option_create" class="form-control">
                                                <option value="">Pilih Opsi</option>
                                                <option value="1">Buat 1 Pengguna</option>
                                                <option value="2">Buat Banyak Pengguna</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-none" id="option_create_1">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email <code>*</code></label>
                                                <input type="text" name="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="form-label">NIM / NIP <code>*</code></label>
                                                <input type="text" name="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password" class="form-label">Password <code>*</code></label>
                                                <input type="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password_confirmation" class="form-label">Password Confirmation <code>*</code></label>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                                            </div>
                                        </div>
    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="{{ route('dashboard.datamaster.user.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row d-none" id="option_create_2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="periode" class="form-label">Periode <code>*</code></label>
                                                <select name="periode" id="periode" class="form-control">
                                                    <option value="">Pilih Periode</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')

<script>
    $(document).ready(function() {

        $('#option_create').on('change', function() {
            if (this.value == '1') {
                $('#option_create_1').removeClass('d-none');
                $('#option_create_2').addClass('d-none');
            } else if (this.value == '2') {
                $('#option_create_1').addClass('d-none');
                $('#option_create_2').removeClass('d-none');
            } 
        });


        // $('#example3').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ajax: "{{ route('prodi.data_table') }}",
        //     columns: [
        //         { data: 'kode_program_studi', name: 'kode_program_studi' },
        //         { data: 'nama_program_studi', name: 'nama_program_studi' },
        //         { data: 'action', name: 'action', orderable: false, searchable: false },
        //     ]
        // });
    });
</script>

@endpush
@endsection
