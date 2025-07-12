@extends('layouts.dashboard.dashboard')
@section('title','Detail Kelas Kuliah')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Detail Kelas Kuliah</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('detail-kelas-kuliah') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Detail Kelas Kuliah</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="mata_kuliah">mata kuliah</label>
                                    <select name="mata_kuliah" id="mata_kuliah" class="form-control select2">
                                        <option value="" selected>Pilih mata kuliah</option>
                                        @foreach ($matakuliah as $item)
                                            <option value="{{ $item->id_matkul }}">{{ $item->nama_mata_kuliah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                                <table id="detailkelaskuliah" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Semester</th>
                                            <th>Prodi</th>
                                            <th>Kode Matakuliah</th>
                                            <th>Nama Matakuliah</th>
                                            <th>Nama Kelas Kuliah</th>
                                            <th>Bahasan</th>
                                            <th>Tanggal Mulai Efektif</th>
                                            <th>Tanggal Akhir Efektif</th>
                                            <th>Kapasitas</th>
                                            <th>Tanggal Tutup Daftar</th>
                                            <th>Prodi Penyelenggara</th>
                                            <th>Perguruan Tinggi Penyelenggara</th>
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

        $('#prodi').on('change', function () {
            let selectedProdi = $(this).val();

            $('#mata_kuliah').html('<option value="" selected>Pilih mata kuliah</option>');

            if (selectedProdi) {
                $.ajax({
                    url:" {{ route('dashboard.datamaster.detail.kelas.kuliah.index') }}",
                    method: 'GET',
                    data : {
                        id_prodi : selectedProdi,
                    },
                    success: function (data) {
                        // clear the mata_kuliah select
                        $('#mata_kuliah').html('<option value="" selected>Pilih mata kuliah</option>');
                        data.forEach(function (item) {
                            $('#mata_kuliah').append(`<option value="${item.id_matkul}">${item.nama_mata_kuliah}</option>`);
                        });
                    },
                    error: function () {
                        alert('Gagal mengambil data mata kuliah.');
                    }
                });
            }
        });

        $('#detailkelaskuliah').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            responsive: true,
            pageLength: 50,
            ajax : {
                url: "{{ route('kelas-kuliah.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                    d.matakuliah = $('#mata_kuliah').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'kode_mata_kuliah', name: 'kode_mata_kuliah' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                // { data: 'bahasan', name: 'bahasan' },
                // { data: 'tanggal_mulai_efektif', name: 'tanggal_mulai_efektif' },
                // { data: 'tanggal_akhir_efektif', name: 'tanggal_akhir_efektif' },
                // { data: 'kapasitas', name: 'kapasitas' },
                // { data: 'tanggal_tutup_daftar', name: 'tanggal_tutup_daftar' },
                // { data: 'prodi_penyelenggara', name: 'prodi_penyelenggara' },
                // { data: 'perguruan_tinggi_penyelenggara', name: 'perguruan_tinggi_penyelenggara' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#prodi').on('change', function() {
            $('#detailkelaskuliah').DataTable().ajax.reload();
        });
        $('#mata_kuliah').on('change', function() {
            $('#detailkelaskuliah').DataTable().ajax.reload();
        });
    });
</script>
@endpush
@endsection
