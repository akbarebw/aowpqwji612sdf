@extends('layouts.dashboard.dashboard')
@section('title','Perhitungan SKS')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Perhitungan SKS</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('Perhitungan SKS') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Perhitungan SKS</h4>
                            <a href="#" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="perhitungan_sks" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>nidn</th>
                                            <th>Nama Dosen</th>
                                            <th>Nama Kelas Kuliah</th>
                                            <th>Perhitungan SKS</th>
                                            <th>Nama Substansi</th>
                                            <th>Rencana Minggu Pertemuan</th>
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
        $('#perhitungan_sks').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            // deferRender: true,
            responsive: true,
            pageLength: 25,
            ajax : "{{ route('perhitungan-sks.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nidn', name: 'nidn' },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'perhitungan_sks', name: 'perhitungan_sks' },
                { data: 'nama_substansi', name: 'nama_substansi' },
                { data: 'rencana_minggu_pertemuan', name: 'rencana_minggu_pertemuan' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

    });
</script>
@endpush
@endsection
