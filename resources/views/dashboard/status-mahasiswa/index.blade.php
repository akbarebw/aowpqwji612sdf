@extends('layouts.dashboard.dashboard')
@section('title','Prodi')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Status Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('prodi') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Data Mahasiswa</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display text-nowrap" style="mi  n-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama Status Mahasiswa</th>
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
        $('#example3').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('status.mahasiswa.data_table') }}",
            columns: [
                { data: 'id_status_mahasiswa', name: 'id_status_mahasiswa' },
                { data: 'nama_status_mahasiswa', name: 'nama_status_mahasiswa' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>

@endpush
@endsection

