@extends('layouts.dashboard.dashboard')
@section('title','Dosen')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('dosen') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Data Dosen</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="agama">Agama</label>
                                    <select name="agama" id="agama" class="form-control select2">
                                        <option value="" selected disabled>Pilih Agama</option>
                                        @foreach ($agama as $item)
                                            <option value="{{ $item->id_agama }}">{{ $item->nama_agama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="status">Status Aktif</label>
                                    <select name="status" id="status" class="form-control select2">
                                        <option value="" selected disabled>Pilih Status Aktif</option>
                                        @foreach ($status as $item)
                                            <option value="{{ $item->id_status_aktif }}">{{ $item->nama_status_aktif }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIDN</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>NIP</th>
                                            <th>Status</th>
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
    $(document).ready(function () {
        $('.select2').select2();

        $('#data_table').DataTable({
            pageLength: 100,
            paginate: true,
            processing: true,
            serverSide: true,
            ajax : {
                url : "{{ route('dosen.data_table') }}",
                data: function (d) {
                    d.agama = $('#agama').val();
                    d.status = $('#status').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nidn', name: 'nidn' },
                { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'nama_agama', name: 'nama_agama' },
                { data: 'nip', name: 'nip' },
                { data: 'nama_status_aktif', name: 'nama_status_aktif' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#agama').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
        $('#status').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
    });
</script>

@endpush
@endsection
