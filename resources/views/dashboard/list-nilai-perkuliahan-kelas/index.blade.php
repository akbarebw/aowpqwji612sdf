@extends('layouts.dashboard.dashboard')
@section('title','List Nilai Perkuliahan Kelas')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>List Nilai Perkuliahan Kelas</h4>
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
                            <h4 class="card-title">Semua List Nilai Perkuliahan Kelas</h4>
                            <a href="#" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="kelaskuliah">Kelas Kuliah</label>
                                    <select name="prodi" id="kelaskuliah" class="form-control select2">
                                        <option value="" selected>Pilih Kelas Kuliah</option>
                                        @foreach ($kelaskuliah as $item)
                                            <option value="{{ $item->id_kelas_kuliah }}">{{ $item->nama_kelas_kuliah}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="matkul">Mata Kuliah</label>
                                    <select name="prodi" id="matkul" class="form-control select2">
                                        <option value="" selected>Pilih Mata Kuliah</option>
                                        @foreach ($matkul as $item)
                                            <option value="{{ $item->id_matkul }}">{{ $item->nama_mata_kuliah}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="list_nilai_perkuliahan_kelas_table" class="display text-nowrap table-fixed" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama mata kuliah</th>
                                            <th>sks mata kuliah</th>
                                            <th>nama kelas kuliah</th>
                                            <th>jumlah mahasiswa krs</th>
                                            <th>jumlah mahasiswa dapat nilai</th>
                                            <th>sks tm</th>
                                            <th>sks prak</th>
                                            <th>sks prak lap</th>
                                            <th>sks sim</th>
                                            <th>bahasan case</th>
                                            <th>a selenggara pditt</th>
                                            <th>a pengguna pditt</th>
                                            <th>kuota pddit</th>
                                            <th>tgl mulai koas</th>
                                            <th>tgl selesai koas</th>
                                            <th>lingkup kelas</th>
                                            <th>mode kuliah</th>
                                            <th>nm smt</th>
                                            <th>nama prodi</th>
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
  
        $('#list_nilai_perkuliahan_kelas_table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('list-nilai-perkuliahan-kelas.data_table') }}",
                data: function (d) {
                    d.kelaskuliah = $('#kelaskuliah').val();
                    d.matkul = $('#matkul').val();

                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'sks_mata_kuliah', name: 'sks_mata_kuliah' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'jumlah_mahasiswa_krs', name: 'jumlah_mahasiswa_krs' },
                { data: 'jumlah_mahasiswa_dapat_nilai', name: 'jumlah_mahasiswa_dapat_nilai' },
                { data: 'sks_tm', name: 'sks_tm' },
                { data: 'sks_prak', name: 'sks_prak' },
                { data: 'sks_prak_lap', name: 'sks_prak_lap' },
                { data: 'sks_sim', name: 'sks_sim' },
                { data: 'bahasan_case', name: 'bahasan_case' },
                { data: 'a_selenggara_pditt', name: 'a_selenggara_pditt' },
                { data: 'a_pengguna_pditt', name: 'a_pengguna_pditt' },
                { data: 'kuota_pditt', name: 'kuota_pditt' },
                { data: 'tgl_mulai_koas', name: 'tgl_mulai_koas' },
                { data: 'tgl_selesai_koas', name: 'tgl_selesai_koas' },
                { data: 'lingkup_kelas', name: 'lingkup_kelas' },
                { data: 'mode_kuliah', name: 'mode_kuliah' },
                { data: 'nm_smt', name: 'nm_smt' },
                { data: 'nama_prodi', name: 'nama_prodi' },
                { data: 'action', name: 'action', orderable: false, searchable:false},
            ]
        });
        
        $('#kelaskuliah').on('change', function() {
            $('#list_nilai_perkuliahan_kelas_table').DataTable().ajax.reload();
        });

        $('#matkul').on('change', function() {
            $('#list_nilai_perkuliahan_kelas_table').DataTable().ajax.reload();
        });
        
    });
</script>

@endpush
@endsection
