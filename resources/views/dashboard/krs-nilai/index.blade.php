@extends('layouts.dashboard.dashboard')
@section('title','Krs Nilai')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Krs Nilai</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('aktivitas Mahasiswa') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">Semua Krs Nilai</h4>
                            <a href="#" class="btn btn-primary btn-sm">+ Tambah</a>
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
                                    <label class="form-label" for="angkatan">Tahun Ajaran</label>
                                    <select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                                        <option value="" selected >Pilih Angkatan</option>
                                        @foreach ($tahun_ajaran as $item)
                                        <option value="{{ $item->id_tahun_ajaran }}">{{ $item->nama_tahun_ajaran }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="angkatan">Angkatan</label>
                                    <select name="" id="" class="form-control">
                                        <option value="" selected>Pilih Angkatan</option>
                                        <option value="">Pilih Angkatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="angkatan">Angkatan</label>
                                    <select name="" id="" class="form-control">
                                        <option value="" selected>Pilih Angkatan</option>
                                        <option value="">Pilih Angkatan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>NIM</th>
                                            <th>Angkatan</th>
                                            <th>Kode Matkul</th>
                                            <th>Nama Kelas Kuliah</th>
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

        $('#example3').DataTable({
            pageLength: 100,
            paginate: true,
            processing: true,
            serverSide: true,
            ajax : {
                url : "{{ route('krs.nilai.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                    d.tahun_ajaran = $('#tahun_ajaran').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'nim', name: 'nim' },
                { data: 'angkatan', name: 'angkatan' },
                { data: 'kode_mata_kuliah', name: 'kode_mata_kuliah' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
        });

        $('#prodi').on('change', function() {
            $('#example3').DataTable().ajax.reload();
        });
    });
</script>

@endpush
@endsection
