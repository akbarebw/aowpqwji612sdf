@extends('layouts.dashboard.dashboard')
@section('title','Kurikulum')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Kurikulum</h4>
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
                            <h4 class="card-title">Semua Kurikulum</h4>
                            <a href="{{ route('dashboard.datamaster.kurikulum.create') }}" class="btn btn-primary float-end">+ Add new</a>
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Prodi</label>
                                    <select name="prodi" id="prodi" class="form-control select2">
                                        <option value="" selected>Pilih Prodi</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id_prodi }}">{{ $item->nama_program_studi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="kurikulum" class="display text-nowrap data_table_class" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kurikulum</th>
                                            <th>Nama Program Studi</th>
                                            <th>Jumlah SKS Lulus</th>
                                            <th>Jumlah SKS Wajib</th>
                                            <th>jumlah_sks_pilihan</th>
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
        $('.select2').select2();

        $('#kurikulum').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            // deferRender: true,
            responsive: true,
            pageLength: 50,
            ajax : {
                url: "{{ route('kurikulum.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_kurikulum', name: 'nama_kurikulum' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'jumlah_sks_lulus', name: 'jumlah_sks_lulus' },
                { data: 'jumlah_sks_wajib', name: 'jumlah_sks_wajib' },
                { data: 'jumlah_sks_pilihan', name: 'jumlah_sks_pilihan' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#prodi').on('change', function() {
            $('#kurikulum').DataTable().ajax.reload();
        });
    });
</script>

@endpush
@endsection
