@extends('layouts.dashboard.dashboard')
@section('title','Export Data Mahasiswa')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Export Data Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('export-data-mahasiswa') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Data Export Data Mahasiswa</h4>
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
                                    <label class="form-label" for="agama">Agama</label>
                                    <select name="agama" id="agama" class="form-control select2">
                                        <option value="" selected>Pilih Agama</option>
                                        @foreach ($agama as $item)
                                            <option value="{{ $item->id_agama }}">{{ $item->nama_agama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                            <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>                                      
                                            <th>Angkatan</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Program Studi</th>
                                            <th>Periode Masuk</th>
                                            <th>Status Mahasiswa</th>
                                            <th>Nama Jenis Pendaftaran</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Nama agama</th>
                                            <th>Status Sync</th>
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
    $(document).ready(function () {
        $('.select2').select2();
  
  $('#data_table').DataTable({
      processing: true,
      serverSide: true,
      ajax : {
          url: "{{ route('export-data-mahasiswa.data_table') }}",
          data: function (d) {
              d.prodi = $('#prodi').val();
              d.agama = $('#agama').val();
          }
      },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'angkatan', name: 'angkatan' },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'program_studi', name: 'program_studi' },
                { data: 'periode_masuk', name: 'periode_masuk' },
                { data: 'status_mahasiswa', name: 'status_mahasiswa' },
                { data: 'nama_jenis_daftar', name: 'nama_jenis_daftar' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'tempat_lahir', name: 'tempat_lahir' },
                { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                { data: 'nama_agama', name: 'nama_agama' },
                { data: 'status_sync', name: 'status_sync' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#prodi').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
        $('#agama').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
        
    });
</script>
@endpush
@endsection
