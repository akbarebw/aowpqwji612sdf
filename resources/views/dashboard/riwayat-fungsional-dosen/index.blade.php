@extends('layouts.dashboard.dashboard')
@section('title','Riwayat Fungsional Dosen')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Riwayat Fungsional Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- {{ Breadcrumbs::render('rekap-krs-mahasiswa') }} -->
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Riwayat Fungsional Dosen</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                            <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dosen</th>                                         
                                            <th>NIDN</th>
                                            <th>Nama Jabatan Fungsional</th>
                                            <th>Mulai SK Jabatan</th>
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
        const table = $('#data_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('riwayat-fungsional-dosen.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'nidn', name: 'nidn' },
                { data: 'nama-jabatan_fungsional', name: 'nama-jabatan_fungsional' },
                { data: 'mulai_sk_jabatan', name: 'mulai_sk_jabatan' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
@endsection
