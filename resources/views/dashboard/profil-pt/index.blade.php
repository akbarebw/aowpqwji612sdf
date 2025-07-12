@extends('layouts.dashboard.dashboard')
@section('title','Profil Pt')

@section('content')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Profil Pt</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- {{ Breadcrumbs::render('agama') }} -->
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Profil Perguruan Tinggi </h4>
                            {{-- <a href="{{ url('add-professor') }}" class="btn btn-primary">+ Add new</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Perguruan Tinggi</th>
                                            <th>Telepon</th>
                                            <th>Faximile</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Jalan</th>
                                            <th>SK Pendirian</th>
                                            <th>Tanggal SK Pendirian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
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
            ajax: "{{ route('profil.pt.data_table') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_perguruan_tinggi', name: 'nama_perguruan_tinggi' },
                { data: 'telepon', name: 'telepon' },
                { data: 'faximile', name: 'faximile' },
                { data: 'email', name: 'email' },
                { data: 'website', name: 'website' },
                { data: 'jalan', name: 'jalan' },
                { data: 'sk_pendirian', name: 'sk_pendirian' },
                { data: 'tanggal_sk_pendirian', name: 'tanggal_sk_pendirian' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

    });
</script>
@endpush

@endsection