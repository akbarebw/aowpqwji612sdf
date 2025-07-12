@extends('layouts.dashboard.dashboard')
@section('title','Penugasan Dosen')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Penugasan Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- {{ Breadcrumbs::render('mahasiswa') }} -->
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Penugasan Dosen</h4>
                            <a href="#" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Tahun Ajaran</label>
                                    <select name="tahunajaran" id="tahunajaran" class="form-control select2">
                                        <option value="" selected>Pilih Tahun Ajaran</option>
                                        @foreach ($tahunajaran as $item)
                                            <option value="{{ $item->id_tahun_ajaran }}">{{ $item->nama_tahun_ajaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                                <table id="penugasan_dosen_table" class="display text-nowrap table-fixed" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dosen</th>                                         
                                            <th>NIDN</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nama Tahun Ajaran</th>
                                            <th>Nama Perguruan Tinggi</th>
                                            <th>Nama Program Studi</th>
                                            <th>Nomor surat tugas</th>
                                            <th>tanggal surat tugas</th>
                                            <th>mulai surat tugas</th>
                                            <th>tgl ptk keluar</th>
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
  
        $('#penugasan_dosen_table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('penugasan-dosen.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                    d.tahunajaran = $('#tahunajaran').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'nidn', name: 'nidn' },
                { data: 'jk', name: 'jk' },
                { data: 'nama_tahun_ajaran', name: 'nama_tahun_ajaran' },
                { data: 'nama_perguruan_tinggi', name: 'nama_perguruan_tinggi' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'nomor_surat_tugas', name: 'nomor_surat_tugas' },
                { data: 'tanggal_surat_tugas', name: 'tanggal_surat_tugas' },
                { data: 'mulai_surat_tugas', name: 'mulai_surat_tugas' },
                { data: 'tgl_ptk_keluar', name: 'tgl_ptk_keluar' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        
        $('#prodi').on('change', function() {
            $('#penugasan_dosen_table').DataTable().ajax.reload();
        });
        $('#tahun-ajaran').on('change', function() {
            $('#penugasan_dosen_table').DataTable().ajax.reload();
        });
    });
</script>

@endpush
@endsection
