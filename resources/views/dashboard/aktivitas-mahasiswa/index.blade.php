@extends('layouts.dashboard.dashboard')
@section('title','Aktivitas Mahasiswa')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Aktivitas Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('aktivitas-mahasiswa') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Aktivitas Mahasiswa</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                                <table id="#aktivitas_mahasiswa" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Semester</th>
                                            <th>Prodi</th>
                                            <th>Judul</th>
                                            <th>Nama Program MBKM</th>
                                            <th>Status</th>
                                            <th>Tanggal Tugas</th>
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
        $('#aktivitas_mahasiswa').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('aktivitas.mahasiswa.data_table') }}",
            columns: [
                // { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'nama_prodi', name: 'nama_prodi' },
                { data: 'judul', name: 'judul' },
                { data: 'nama_program_mbkm', name: 'nama_program_mbkm' },
                { data: 'tanggal_sk_tugas', name: 'tanggal_sk_tugas' },
                { data: 'status_sync', name: 'status_sync' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
@endsection
