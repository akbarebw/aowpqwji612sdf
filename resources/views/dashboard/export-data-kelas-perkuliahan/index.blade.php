@extends('layouts.dashboard.dashboard')
@section('title','Export Data Kelas Perkuliahan')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Export Data Kelas Perkuliahan</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('export-data-kelas-perkuliahan') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Export Data Kelas Perkuliahan</h4>
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
                                    <label class="form-label" for="kelas-kuliah">Kelas Kuliah</label>
                                    <select name="kelas-kuliah" id="kelas-kuliah" class="form-control select2">
                                        <option value="" selected>Pilih Kelas Kuliah</option>
                                        @foreach ($kelaskuliah as $item)
                                            <option value="{{ $item->id_kelas_kuliah }}">{{ $item->nama_kelas_kuliah}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                            <table id="exportdatakelasperkuliahan" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>                                      
                                            <th>Nama Program Studi</th>
                                            <th>Nama Periode</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Nama Kelas Kuliah</th>
                                            <th>Sks Mata Kuliah</th>
                                            <th>Jumlah Krs</th>
                                            <th>Jumlah Dosen</th>
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
  
  $('#exportdatakelasperkuliahan').DataTable({
      processing: true,
      serverSide: true,
      ajax : {
          url: "{{ route('export-data-kelas-perkuliahan.data_table') }}",
          data: function (d) {
              d.prodi = $('#prodi').val();
              d.kelaskuliah = $('#kelas-kuliah').val();
          }
      },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'nama_periode', name: 'nama_periode' },
                { data: 'kode_mata_kuliah', name: 'kode_mata_kuliah' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'sks_mata_kuliah', name: 'sks_mata_kuliah' },
                { data: 'jumlah_krs', name: 'jumlah_krs' },
                { data: 'jumlah_dosen', name: 'jumlah_dosen' },
                { data: 'status_sync', name: 'status_sync' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#prodi').on('change', function() {
            $('#exportdatakelasperkuliahan').DataTable().ajax.reload();
        }); 
        $('#kelas-kuliah').on('change', function() {
            $('#exportdatakelasperkuliahan').DataTable().ajax.reload();
        }); 
    });
</script>
@endpush
@endsection
