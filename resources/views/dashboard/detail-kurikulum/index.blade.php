@extends('layouts.dashboard.dashboard')
@section('title','Detail Kurikulum')

@section('content')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Detail Kurikulum</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('kebutuhan_khusus') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Detail Kurikulum </h4>
                            {{-- <a href="{{ url('add-professor') }}" class="btn btn-primary">+ Add new</a> --}}
                            <a href="#" class="btn btn-primary btn-sm">+ Tambah</a>
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Prodi</label>
                                    <select name="prodi" id="prodi" class="form-control select2">
                                        <option value="" selected disabled>Pilih Prodi</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id_prodi }}">{{ $item->nama_program_studi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="semester">Semester</label>
                                    <select name="semester" id="semester" class="form-control select2">
                                        <option value="" selected disabled>Pilih Semester</option>
                                        @foreach ($semester as $item)
                                        <option value="{{ $item->id_semester }}">{{ $item->nama_semester }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="kurikulum">Kurikulum</label>
                                    <select name="kurikulum" id="kurikulum" class="form-control select2">
                                        <option value="" selected disabled>Pilih Kurikulum</option>
                                        @foreach ($kurikulum as $item)
                                        <option value="{{ $item->id_kurikulum }}">{{ $item->nama_kurikulum }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kurikulum</th>
                                            <th>Nama Program Studi</th>
                                            <th>Semester Mulai Berlaku</th>
                                            <th>Jumlah SKS Lulus</th>
                                            <th>Jumlah SKS Wajib</th>
                                            <th>Jumlah SKS Pilihan</th>
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

        $('#data_table').DataTable({
            pageLength: 100,
            paginate: true,
            processing: true,
            serverSide: true,
            ajax : {
                url : "{{ route('detail.kurikulum.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                    d.semester = $('#semester').val();
                    d.kurikulum = $('#kurikulum').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_kurikulum', name: 'nama_kurikulum' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'semester_mulai_berlaku', name: 'semester_mulai_berlaku' },
                { data: 'jumlah_sks_lulus', name: 'jumlah_sks_lulus' },
                { data: 'jumlah_sks_wajib', name: 'jumlah_sks_wajib' },
                { data: 'jumlah_sks_pilihan', name: 'jumlah_sks_pilihan' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#prodi').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });

        $('#semester').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
        $('#kurikulum').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });

    });
</script>
@endpush

@endsection