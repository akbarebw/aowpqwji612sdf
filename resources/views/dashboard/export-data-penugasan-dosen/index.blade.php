@extends('layouts.dashboard.dashboard')
@section('title','Export Data Penugasan Dosen')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Export Data Penugasan Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('export-data-penugasan-dosen') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Export Data Penugasan Dosen</h4>
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
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                            <table id="export-data-penugasan-dosen_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dosen</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nama Agama</th>
                                            <th>Nama Program Studi</th>
                                            <th>Periode Mengajar</th>
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

        $('#export-data-penugasan-dosen_table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('export-data-penugasan-dosen.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'tempat_lahir', name: 'tempat_lahir' },
                { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                { data: 'nama_agama', name: 'nama_agama' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'periode_mengajar', name: 'periode_mengajar' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#prodi').on('change', function() {
            $('#export-data-penugasan-dosen_table').DataTable().ajax.reload();
        });
    });
</script>
@endpush
@endsection
