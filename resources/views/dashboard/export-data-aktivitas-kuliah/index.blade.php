@extends('layouts.dashboard.dashboard')
@section('title','Export Data Aktivitas Kuliah')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Export Data Aktivitas Kuliah</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('export-data-aktivitas-kuliah') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Export Data Aktivitas Kuliah</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
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
                            <div class="table-responsive" style="overflow-x: scroll">
                            <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Nim</th>
                                            <th>Nama Status Mahasiswa</th>
                                            <th>Nama Periode</th>
                                            <th>Sks Semester</th>
                                            <th>Ips</th>
                                            <th>Ipk</th>
                                            <th>Total Sks</th>
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

        $('#data_table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('export-data-aktivitas-kuliah.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                    d.statusmahasiswa = $('#status-mahasiswa').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'nim', name: 'nim' },
                { data: 'nama_status_mahasiswa', name: 'nama_status_mahasiswa' },
                { data: 'nama_periode', name: 'nama_periode' },
                { data: 'sks_semester', name: 'sks_semester' },
                { data: 'ips', name: 'ips' },
                { data: 'ipk', name: 'ipk' },
                { data: 'total_sks', name: 'total_sks' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#prodi').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
        $('#status-mahasiswa').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
    });
</script>
@endpush
@endsection
