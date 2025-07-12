@extends('layouts.dashboard.dashboard')

@section('title','Pengguna')

@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Pengguna</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('user') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Pengguna</h4>
                            <a href="{{ route('dashboard.datamaster.user.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display text-nowrap" style="min-width: 845px;">
                                    <thead>
                                        <tr>
                                            <th>NIM / NIP</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
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
        // $('#example3').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ajax: "{{ route('prodi.data_table') }}",
        //     columns: [
        //         { data: 'kode_program_studi', name: 'kode_program_studi' },
        //         { data: 'nama_program_studi', name: 'nama_program_studi' },
        //         { data: 'action', name: 'action', orderable: false, searchable: false },
        //     ]
        // });
    });
</script>

@endpush
@endsection
