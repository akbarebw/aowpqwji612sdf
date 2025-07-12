<!-- @extends('layouts.dashboard.dashboard')
@section('title','Prodi') -->
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Jenjang Pendidikan</h4>
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
                            <h4 class="card-title">Jenjang Pendidikan</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="jenjang" class="display text-nowrap" style="mi  n-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Id Jenjang Didik</th>
                                            <th>Nama Jenjang Didik</th>
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
        $('#jenjang').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('jenjang-pendidikan.data_table') }}",
            columns: [
                { data: 'id_jenjang_didik', name: 'id_jenjang_didik' },
                { data: 'nama_jenjang_didik', name: 'nama_jenjang_didik' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>

@endpush
@endsection
