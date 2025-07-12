@extends('layouts.dashboard.dashboard')
@section('title','Rekap jumlah Dosen')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Rekap Jumlah Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('rekap-jumlah-dosen') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Rekap Jumlah Dosen</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                            <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Periode</th>                                         
                                            <th>Nama Program Studi</th>
                                            <th>Jumlah Dosen Homebase</th>
                                            <th>Is Homebase</th>
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
            ajax: "{{ route('rekap-jumlah-dosen.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_periode', name: 'nama_periode' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'jumlah_dosen_homebase', name: 'jumlah_dosen_homebase' },
                { data: 'is_homebase', name: 'is_homebase' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
@endsection
