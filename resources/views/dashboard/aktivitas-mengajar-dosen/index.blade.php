@extends('layouts.dashboard.dashboard')
@section('title','Aktivitas Mengajar Dosen')
@section('content')


<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Aktivitas Mengajar Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('aktivitas-mengajar-dosen') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Aktivitas Mengajar Dosen</h4>
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
                                    <label class="form-label" for="mata-kuliah">Mata Kuliah</label>
                                    <select name="mata-kuliah" id="mata-kuliah" class="form-control select2">
                                        <option value="" selected>Pilih Mata Kuliah</option>
                                        @foreach ($matkul as $item)
                                            <option value="{{ $item->id_matkul }}">{{ $item->nama_mata_kuliah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="aktivitas_mengajar_dosen" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dosen</th>
                                            <th>Periode</th>
                                            <th>Nama Program Studi</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Nama Kelas Kuliah</th>
                                            <th>Rencana Minggu Pertemuan</th>
                                            <th>Realisasi Minggu Pertemuan</th>
                                            <th>Aksi</th>
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

        $('#aktivitas_mengajar_dosen').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            pageLength: 50,
            ajax : {
                url: "{{ route('aktivitas-mengajar-dosen.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                    d.matkul = $('#mata-kuliah').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'nama_periode', name: 'nama_periode' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'rencana_minggu_pertemuan', name: 'rencana_minggu_pertemuan' },
                { data: 'realisasi_minggu_pertemuan', name: 'realisasi_minggu_pertemuan' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#mata-kuliah').on('change', function() {
            $('#aktivitas_mengajar_dosen').DataTable().ajax.reload();
        });

        $('#prodi').on('change', function() {
            $('#aktivitas_mengajar_dosen').DataTable().ajax.reload();
        });

    });
</script>

@endpush
@endsection
