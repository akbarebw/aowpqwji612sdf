@extends('layouts.dashboard.dashboard')
@section('title','Detail Mata Kuliah')

@section('content')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Detail Mata Kuliah</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('kebutuhan_khusus') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Detail Mata Kuliah </h4>
                            {{-- <a href="{{ url('add-professor') }}" class="btn btn-primary">+ Add new</a> --}}
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
                                    <label class="form-label" for="matkul">Mata Kuliah</label>
                                    <select name="matkul" id="matkul" class="form-control select2">
                                        <option value="" selected disabled>Pilih Mata Kuliah</option>
                                        @foreach ($matkul as $item)
                                        <option value="{{ $item->id_matkul }}">{{ $item->nama_mata_kuliah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Nama Program Studi</th>
                                            <th>ID Jenis Mata Kuliah</th>
                                            <th>ID Kelompok Mata Kuliah</th>
                                            <th>SKS Mata Kuliah</th>
                                            <th>SKS Tatap Muka</th>
                                            <th>SKS Praktek</th>
                                            <th>SKS Praktek Lapangan</th>
                                            <th>SKS Simulasi</th>
                                            <th>Metode Kuliah</th>
                                            <th>ADA SAP</th>
                                            <th>ADA Silabus</th>
                                            <th>ADA Bahan Ajar</th>
                                            <th>ADA Acara Praktek</th>
                                            <th>ADA Diktat</th>
                                            <th>Tanggal Mulai Efektif</th>
                                            <th>Tanggal Selesai Efektif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
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

        $('#data_table').DataTable({
            pageLength: 100,
            paginate: true,
            processing: true,
            serverSide: true,
            ajax : {
                url : "{{ route('detail-mata-kuliah.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                    d.matkul = $('#matkul').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'kode_mata_kuliah', name: 'kode_mata_kuliah' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'id_jenis_mata_kuliah', name: 'id_jenis_mata_kuliah' },
                { data: 'id_kelompok_mata_kuliah', name: 'id_kelompok_mata_kuliah' },
                { data: 'sks_mata_kuliah', name: 'sks_mata_kuliah' },
                { data: 'sks_tatap_muka', name: 'sks_tatap_muka' },
                { data: 'sks_praktek', name: 'sks_praktek' },
                { data: 'sks_praktek_lapangan', name: 'sks_praktek_lapangan' },
                { data: 'sks_simulasi', name: 'sks_simulasi' },
                { data: 'metode_kuliah', name: 'metode_kuliah' },
                { data: 'ada_sap', name: 'ada_sap' },
                { data: 'ada_silabus', name: 'ada_silabus' },
                { data: 'ada_bahan_ajar', name: 'ada_bahan_ajar' },
                { data: 'ada_acara_praktek', name: 'ada_acara_praktek' },
                { data: 'ada_diktat', name: 'ada_diktat' },
                { data: 'tanggal_mulai_efektif', name: 'tanggal_mulai_efektif' },
                { data: 'tanggal_selesai_efektif', name: 'tanggal_selesai_efektif' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
        });

        $('#prodi').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
        $('#matkul').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
    });
</script>
@endpush

@endsection