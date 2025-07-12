@extends('layouts.dashboard.dashboard')
@section('title','Export Data Mahasiswa Lulus')

@section('content')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Export Data Mahasiswa Lulus</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
            {{ Breadcrumbs::render('export-data-mahasiswa-lulus') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Semua Export Data Mahasiswa Lulus</h4>
                        {{-- <a href="{{ url('add-professor') }}" class="btn btn-primary">+ Add new</a> --}}
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Prodi</label>
                                    <select name="prodi" id="prodi" class="form-control select2">
                                        <option value="" selected>Pilih Prodi</option>
                                        @foreach ($prodi as $item)
                                        <option value="{{ $item->id_prodi }}">{{ $item->nama_program_studi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="exportdatamahasiswalulus" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nama Program Studi</th>
                                            <th>Nama Periode Masuk</th>
                                            <th>Nama Jenis Keluar</th>
                                            <th>Nomor Ijazah</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Keterangan</th>
                                            <th>Status Sync</th>
                                            <th>Action</th>
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

$('#exportdatamahasiswalulus').DataTable({
    processing: true,
    serverSide: true,
    ordering: true,
    responsive: true,
    pageLength: 50,
    ajax : {
        url: "{{ route('export-data-mahasiswa-lulus.data_table') }}",
        data: function (d) {
            d.prodi = $('#prodi').val();
        }
    },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nim',name: 'nim', },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'nama_periode_masuk', name: 'nama_periode_masuk' },
                { data: 'nama_jenis_keluar', name: 'nama_jenis_keluar' },
                { data: 'nomor_ijazah', name: 'nomor_ijazah' },
                { data: 'tanggal_keluar', name: 'tanggal_keluar' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'status_sync', name: 'status_sync' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#prodi').on('change', function() {
            $('#exportdatamahasiswalulus').DataTable().ajax.reload();
        });  

    });
</script>
@endpush
@endsection