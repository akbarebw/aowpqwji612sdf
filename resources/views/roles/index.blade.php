@extends('layouts.dashboard.dashboard')
@section('content')
@extends('layouts.dashboard.dashboard')

@section('title', 'Roles')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Roles</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    {{ Breadcrumbs::render('roles') }}
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Semua Role</h4>
                                <a href="{!! route('roles.create') !!}" class="btn btn-primary btn-sm">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                </div>
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
        //     columns: [
        //         { data: 'kode_role', name: 'kode_role' },
        //         { data: 'nama_role', name: 'nama_role' },
        //         { data: 'action', name: 'action', orderable: false, searchable: false },
        //     ]
        // });
    });
</script>
@endpush

@endsection
