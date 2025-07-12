@extends('layouts.dashboard.dashboard')
@section('title','Kelas Kuliah')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Kelas Kuliah</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('kelas kuliah') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Kelas Kuliah</h4>
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
                            <div class="table-responsive">
                                <table id="kelaskuliah" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Program Studi</th>
                                            <th>Semester</th>
                                            <th>Kode Matakuliah</th>
                                            <th>Matakuliah</th>
                                            <th>Kelas</th>
                                            <th>SKS</th>
                                            <th>Nama Dosen</th>
                                            <th>Jumlah Mahasiswa</th>
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
                    url:" {{ route('dashboard.datamaster.kelas.kuliah.index') }}",
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

        $('#kelaskuliah').DataTable({
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
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'kode_mata_kuliah', name: 'kode_mata_kuliah' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'sks', name: 'sks' },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'jumlah_mahasiswa', name: 'jumlah_mahasiswa' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#prodi').on('change', function() {
            $('#kelaskuliah').DataTable().ajax.reload();
        });
        $('#mata_kuliah').on('change', function() {
            $('#kelaskuliah').DataTable().ajax.reload();
        });
    });
</script>

@endpush
@endsection
