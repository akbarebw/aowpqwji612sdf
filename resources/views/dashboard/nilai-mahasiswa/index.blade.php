@extends('layouts.dashboard.dashboard')
@section('title','Nilai Mahasiswa')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Nilai Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('nilai-perkuliahan-kelas') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Nilai Mahasiswa</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>

                        <div class="row m-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="tahun_ajaran">Tahun Ajaran</label>
                                    <select name="tahun_ajaran" id="tahun_ajaran" class="form-control select2">
                                        <option value="" selected>Pilih Tahun Ajaran</option>
                                        @foreach ($tahunAjaran as $item)
                                            <option value="{{ $item->id_tahun_ajaran }}" {{ old('tahun_ajaran') == $item->id_tahun_ajaran ? 'selected' : '' }}>{{ str_replace('/', '-', $item->nama_tahun_ajaran) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Prodi</label>
                                    <select name="prodi" id="prodi" class="form-control select2">
                                        <option value="" selected>Pilih Prodi</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id_prodi }}" {{ old('prodi') == $item->id_prodi ? 'selected' : '' }}>{{ $item->nama_program_studi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="semester">Semester</label>
                                    <select name="semester" id="semester" class="form-control select2">
                                        <option value="" selected>Pilih Semester</option>
                                        @foreach ($semester as $item)
                                            <option value="{{ $item->id_semester }}" {{ old('semester') == $item->id_semester ? 'selected' : '' }}>{{ $item->nama_semester }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Semester Tempuh</label>
                                    <select name="prodi_id" class="form-control select2 me-2">
                                        <option value="" selected>Pilih Semester Tempuh</option>
                                        @foreach ($semesterTempuh as $sT)
                                            <option value="{{ $sT->id_semester_tempuh }}" {{ old('prodi_id') == $sT->id_semester_tempuh ? 'selected' : '' }}>{{ $sT->semester }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Kelas </label>
                                    <select name="prodi" id="prodi" class="form-control select2">
                                        <option value="" selected>Pilih Kelas</option>
                                        <option value="">A</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Jenjang</label>
                                    <select name="prodi" id="prodi" class="form-control select2">
                                        <option value="" selected>Pilih Jenjang</option>
                                        @foreach ($jenjangPendidikan as $jenjang)
                                            @if($jenjang->nama_jenjang_didik == 'D3' || $jenjang->nama_jenjang_didik == 'D4')
                                                <option value="{{ $jenjang->id_jenjang_didik }}">{{ $jenjang->nama_jenjang_didik }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Mata Kuliah</label>
                                    <select name="prodi" id="prodi" class="form-control select2">
                                        <option value="" selected>Pilih Mata Kuliah</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id_prodi }}">{{ $item->nama_program_studi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Informasi</label>
                                    <input type="text" class="form-control" readonly id="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                            <table id="nilaiperkuliahankelas" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Matakuliah</th>
                                            <th>Nama Matakuliah</th>
                                            <th>Kelas</th>
                                            <th>SKS</th>
                                            <th>Jumlah Mahasiswa KRS</th>
                                            <th>Jumlah Mahasiswa Dapat Nilai</th>
                                            <th>SKS TM</th>
                                            <th>SKS Praktek</th>
                                            <th>SKS Praktek Lapangan</th>
                                            <th>SKS SIM</th>
                                            <th>Pembahasan</th>
                                            <th>Semester</th>
                                            <th>Program Studi</th>
                                            <th>Tanggal dibuat</th>
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
    $(document).ready(function () {
        $('.select2').select2();

        $('#nilaiperkuliahankelas').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            // deferRender: true,
            responsive: true,
            pageLength: 50,
            ajax : {
                url: "{{ route('nilai-perkuliahan-kelas.data_table') }}",
                data: function (d) {
                    d.kelaskuliah = $('#kelaskuliah').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'kode_mata_kuliah', name: 'kode_mata_kuliah' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'sks_mata_kuliah', name: 'sks_mata_kuliah' },
                { data: 'jumlah_mahasiswa_krs', name: 'jumlah_mahasiswa_krs' },
                { data: 'jumlah_mahasiswa_dapat_nilai', name: 'jumlah_mahasiswa_dapat_nilai' },
                { data: 'sks_tm', name: 'sks_tm' },
                { data: 'sks_prak', name: 'sks_prak' },
                { data: 'sks_prak_lap', name: 'sks_prak_lap' },
                { data: 'sks_sim', name: 'sks_sim' },
                { data: 'bahasan_case', name: 'bahasan_case' },
                { data: 'nm_smt', name: 'nm_smt' },
                { data: 'nama_prodi', name: 'nama_prodi' },
                { data: 'tgl_create', name: 'tgl_create' },
                { data: 'status_sync', name: 'status_sync' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#kelaskuliah').on('change', function() {
            $('#nilaiperkuliahankelas').DataTable().ajax.reload();
        });
    });
</script>
@endpush
@endsection