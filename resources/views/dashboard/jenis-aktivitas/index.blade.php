@extends('layouts.dashboard.dashboard')
@section('title','jenis-aktivitas')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Jenis Aktivitas</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('jenis-aktivitas') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Jenis Aktivitas</h4>
                            <a href="" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Jenis Aktivitas</th>
                                            <th>Jenis Aktivitas</th>
                                            <th>Untuk Kampus Merdeka</th>
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
        $('#data_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('jenis-aktivitas.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'id_jenis_aktivitas', name: 'id_jenis_aktivitas' },
                { data: 'nama_jenis_aktivitas', name: 'nama_jenis_aktivitas' },
                { data: 'untuk_kampus_merdeka', name: 'untuk_kampus_merdeka' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>

@endpush

@endsection