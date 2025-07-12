@extends('layouts.dashboard.dashboard')
@section('title','Peserta Kelas Kuliah')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Peserta Kelas Kuliah</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('Peserta Kelas Kuliah') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Peserta Kelas Kuliah</h4>
                            <a href="#" class="btn btn-primary">+ Tambah</a>
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
                                <table id="pesertakelaskuliah" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kelas Kuliah</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Kode Matakuliah</th>
                                            <th>Nama Matakuliah</th>
                                            <th>Nama Prodi</th>
                                            <th>Angkatan</th>
                                            <th>Status</th>
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

    $('#pesertakelaskuliah').DataTable({
    processing: true,
    serverSide: true,
    ordering: true,
    responsive: true,
    pageLength: 50,
    ajax : {
        url: "{{ route('peserta-kelas-kuliah.data_table') }}",
        data: function (d) {
            d.prodi = $('#prodi').val();
        }
    },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'nim', name: 'nim' },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'kode_mata_kuliah', name: 'kode_mata_kuliah' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'angkatan', name: 'angkatan' },
                { data: 'status_sync', name: 'status_sync' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#prodi').on('change', function() {
            $('#pesertakelaskuliah').DataTable().ajax.reload();
        });

    });
</script>

@endpush
@endsection
