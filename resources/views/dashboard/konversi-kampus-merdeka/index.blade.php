@extends('layouts.dashboard.dashboard')
@section('title', 'Konversi Kampus Merdeka')
@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Data Konversi Kampus Merdeka</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                     {{ Breadcrumbs::render('konversi-kampus-merdeka') }} 
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Semua Konversi Kampus Merdeka</h4>
                                <!-- Tombol Tambah dengan route yang sesuai -->
                                <a href="{{ route('dashboard.datamaster.konversi.kampus.merdeka.create') }}" class="btn btn-primary">+ Tambah</a>
                            </div>
                            <div class="row m-2">
                                <h4>Filter</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="matkul">Matkul</label>
                                        <select name="matkul" id="matkul" class="form-control select2">
                                            <option value="" selected>Pilih Matkul</option>
                                            @foreach ($matkul as $item)
                                                <option value="{{ $item->nama_mata_kuliah }}">{{ $item->nama_mata_kuliah }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="semester">Semester</label>
                                        <select name="semester" id="semester" class="form-control select2">
                                            <option value="" selected>Pilih Semester</option>
                                            @foreach ($semester as $item)
                                                <option value="{{ $item->nama_semester }}">{{ $item->nama_semester }}</option>
                                            @endforeach
                                        </select>                                  
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="overflow-x: scroll">
                                    <table id="konversikampusmerdeka" class="display text-nowrap" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Nim</th>
                                                <th>Nama Matakuliah</th>
                                                <th>Nama Semester</th>
                                                <th>SKS Mata Kuliah</th>
                                                <th>Judul</th>
                                                <th>Nilai Angka</th>
                                                <th>Nilai Huruf</th>
                                                <th>Nilai Indeks</th>
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
</div>

@push('script')
<script>
    $(document).ready(function() {
        // Inisialisasi select2 untuk filter
        $('.select2').select2();
  
        // Inisialisasi DataTable
        $('#konversikampusmerdeka').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('konversi-kampus-merdeka.data_table') }}",
                data: function (d) {
                    d.matkul = $('#matkul').val();
                    d.semester = $('#semester').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'nim', name: 'nim' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'sks_mata_kuliah', name: 'sks_mata_kuliah' },
                { data: 'judul', name: 'judul' },
                { data: 'nilai_angka', name: 'nilai_angka' },
                { data: 'nilai_huruf', name: 'nilai_huruf' },
                { data: 'nilai_indeks', name: 'nilai_indeks' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        
        // Reload data ketika filter diubah
        $('#matkul').on('change', function() {
            $('#konversikampusmerdeka').DataTable().ajax.reload();
        });

        $('#semester').on('change', function() {
            $('#konversikampusmerdeka').DataTable().ajax.reload();
        });

    });
</script>
@endpush
@endsection
