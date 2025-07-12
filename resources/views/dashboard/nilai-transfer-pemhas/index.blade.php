@extends('layouts.dashboard.dashboard')
@section('title','Nilai Transfer Pendidikan Mahasiswa')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Nilai Transfer Pendidikan Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('nilai-transfer-pemhas') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Nilai Transfer Pendidikan Mahasiswa</h4>
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
                                    <label class="form-label" for="matakuliah">MataKuliah</label>
                                    <select name="matkul" id="matkul" class="form-control select2">
                                        <option value="" selected>Pilih MataKuliah</option>
                                        @foreach ($matkul as $item)
                                            <option value="{{ $item->nama_mata_kuliah_asal }}">{{ $item->nama_mata_kuliah_asal}}</option>
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
                                            <option value="{{ $item->id_semester }}">{{ $item->nama_semester}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="nilaitransfer_table" class="display text-nowrap table-fixed" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Nama Mahasiswa</th>
                                            <th>Nim</th>
                                            <th>Program Studi</th>
                                            <th>Kode Matkul Asal</th>
                                            <th>Sks Matkul Asal</th>
                                            <th>Nilai Huruf Asal</th>
                                            <th>Kode Matkul Diakui</th>
                                            <th>Nama Matkul Diakui</th>
                                            <th>Sks Matkul Diakui</th>
                                            <th>Nilai Huruf Diakui</th>
                                            <th>Nilai Angka Diakui</th>
                                            <th>Judul</th>
                                            <th>Nama Jenis Aktivitas</th>
                                            <th>Semester</th>
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
    $(document).ready(function() {
        $('.select2').select2();
  
        $('#nilaitransfer_table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('nilai-transfer-pemhas.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                    d.matkul = $('#matkul').val();
                    d.semester = $('#semester').val();
                }
            },
            columns: [
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'nim', name: 'nim' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'kode_mata_kuliah_asal', name: 'kode_mata_kuliah_asal' },
                { data: 'sks_mata_kuliah_asal', name: 'sks_mata_kuliah_asal' },
                { data: 'nilai_huruf_asal', name: 'nilai_huruf_asal' },
                { data: 'kode_matkul_diakui', name: 'kode_matkul_diakui' },
                { data: 'nama_mata_kuliah_diakui', name: 'nama_mata_kuliah_diakui' },
                { data: 'sks_mata_kuliah_diakui', name: 'sks_mata_kuliah_diakui' },
                { data: 'nilai_huruf_diakui', name: 'nilai_huruf_diakui' },
                { data: 'nilai_angka_diakui', name: 'nilai_angka_diakui' },
                { data: 'judul', name: 'judul' },
                { data: 'nama_jenis_aktivitas', name: 'nama_jenis_aktivitas' },
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'status_sync', name: 'status_sync' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        
        $('#prodi').on('change', function() {
            $('#nilaitransfer_table').DataTable().ajax.reload();
        });
        $('#matkul').on('change', function() {
            $('#nilaitransfer_table').DataTable().ajax.reload();
        });
        $('#semester').on('change', function() {
            $('#nilaitransfer_table').DataTable().ajax.reload();
        });
    });
</script>

@endpush
@endsection
