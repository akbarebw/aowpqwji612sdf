@extends('layouts.dashboard.dashboard')
@section('title','Status Keaktifan Pegawai')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Status Keaktifan Pegawai</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
            {{ Breadcrumbs::render('status-keaktifan-pegawai') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Status Keaktifan Pegawai</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="status-keaktifan-pegawai_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Status Aktif</th>
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
        const table = $('#status-keaktifan-pegawai_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('status-keaktifan-pegawai.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_status_aktif', name: 'nama_status_aktif' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>

@endpush
@endsection
