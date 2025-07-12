@extends('layouts.dashboard.dashboard')
@section('title','semester')
@section('content')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Semester</h4>
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
                            <h4 class="card-title">Semua Semester </h4>
                            {{-- <a href="{{ url('add-professor') }}" class="btn btn-primary">+ Add new</a> --}}
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="tahunajaran">tahun ajaran</label>
                                    <select name="tahunajaran" id="tahunajaran" class="form-control select2">
                                        <option value="" selected>Pilih Tahun Ajaran</option>
                                        @foreach ($tahunajaran as $item)
                                            <option value="{{ $item->id_tahun_ajaran }}">{{ $item->id_tahun_ajaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="semester" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Semester</th>
                                            <th>Semester</th>
                                            <th>A Periode Aktif</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Seleksi</th>
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
        $('.select2').select2();

        $('#semester').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            // deferRender: true,
            responsive: true,
            pageLength: 50,
            ajax : {
                url: "{{ route('semester.data_table') }}",
                data: function (d) {
                    d.tahunajaran = $('#tahunajaran').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                // { data: 'id_semester', name: 'id_semester' },
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'semester', name: 'semester' },
                { data: 'a_periode_aktif', name: 'a_periode_aktif' },
                { data: 'tanggal_mulai', name: 'tanggal_mulai' },
                { data: 'tanggal_selesai', name: 'tanggal_selesai' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#tahunajaran').on('change', function() {
            $('#semester').DataTable().ajax.reload();
        });

    });
</script>
@endpush

@endsection