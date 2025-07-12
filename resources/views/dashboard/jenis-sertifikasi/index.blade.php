@extends('layouts.dashboard.dashboard')
@section('title','Jenis Sertifikasi')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Jenis Sertifikasi</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('aktivitas Mahasiswa') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Jenis Sertifikasi</h4>
                            <a href="#" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="jenis_sertifikasi" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Sertifikasi</th>
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
        $('#jenis_sertifikasi').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 50,
            ajax: "{{ route('jenis.sertifikasi.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_jenis_sertifikasi', name: 'nama_jenis_sertifikasi' },
            ]
        });
    });
</script>

@endpush
@endsection
