@extends('layouts.dashboard.dashboard')
@section('title','Mahasiswa')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('mahasiswa') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Mahasiswa</h4>
                            <a href="#" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Prodi</label>
                                    <select name="prodi" id="prodi" class="form-control select2">
                                        <option value="" selected>Pilih Prodi</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id_prodi }}">{{ $item->nama_program_studi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="status-mahasiswa">Status Mahasiswa</label>
                                    <select name="status-mahasiswa" id="status-mahasiswa" class="form-control select2">
                                        <option value="" selected>Pilih Status Mahasiswa</option>
                                        @foreach ($statusmahasiswa as $item)
                                            <option value="{{ $item->nama_status_mahasiswa }}">{{ $item->nama_status_mahasiswa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="mahasiswa_table" class="display text-nowrap table-fixed" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>IPK</th>
                                            <th>Agama</th>
                                            <th>Program Studi</th>
                                            <th>Status Mahasiswa</th>
                                            <th>Periode Masuk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody></tbody>
                                </table>
                            </div>
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
        $('.select2').select2();
  
        $('#mahasiswa_table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('mahasiswa.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                    d.statusmahasiswa = $('#status-mahasiswa').val();
                }
            },
            columns: [
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                { data: 'ipk', name: 'ipk' },
                { data: 'nama_agama', name: 'nama_agama' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'nama_status_mahasiswa', name: 'nama_status_mahasiswa' },
                { data: 'nama_periode_masuk', name: 'nama_periode_masuk' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        
        $('#prodi').on('change', function() {
            $('#mahasiswa_table').DataTable().ajax.reload();
        });
        $('#status-mahasiswa').on('change', function() {
            $('#mahasiswa_table').DataTable().ajax.reload();
        });
    });
</script>

@endpush
@endsection
