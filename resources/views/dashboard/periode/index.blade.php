@extends('layouts.dashboard.dashboard')
@section('title','Periode')

@section('content')

<div class="container-fluid">
    <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Periode</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('periode') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Periode</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Prodi</th>
                                            <th>Nama Program Studi</th>
                                            <th>Status Prodi</th>
                                            <th>Jenjang Pendidikan</th>
                                            <th>Periode Pelaporan</th>
                                            <th>Tipe Periode</th>
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
        const table = $('#data_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('periode.data_table') }}",
            columns: [

                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'kode_prodi', name: 'kode_prodi' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'status_prodi', name: 'status_prodi' },
                { data: 'jenjang_pendidikan', name: 'jenjang_pendidikan'},
                { data: 'periode_pelaporan', name: 'periode_pelaporan'},
                { data: 'tipe_periode' , name: 'tipe_periode' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>

@endpush
@endsection
