@extends('layouts.dashboard.dashboard')
@section('title','List Mata Kuliah')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>List Mata Kuliah</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('list-mata-kuliah') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua List Mata Kuliah</h4>
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
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                            <table id="listmatakuliah" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tgl Create</th>                                         
                                            <th>Jns Mk</th>
                                            <th>Kel Mk</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Sks Mata Kuliah</th>
                                            <th>Nama Program Studi</th>
                                            <th>Sks Tatap Muka</th>
                                            <th>Sks Praktek</th>
                                            <th>Sks Praktek Lapangan</th>
                                            <th>Sks Simulasi</th>
                                            <th>Metode Kuliah</th>
                                            <th>Ada Sap</th>
                                            <th>Ada Silabus</th>
                                            <th>Ada Bahan Ajar</th>
                                            <th>Ada Acara Praktek</th>
                                            <th>Ada Diktat</th>
                                            <th>Tanggal Mulai Efektif</th>
                                            <th>Tanggal Selesai Efektif</th>
                                            <th>Nama Kelompok Mata Kuliah</th>
                                            <th>Nama Jenis Mata Kuliah</th>
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

        $('#listmatakuliah').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            // deferRender: true,
            responsive: true,
            pageLength: 50,
            ajax : {
                url: "{{ route('list-mata-kuliah.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'tgl_create', name: 'tgl_create' },
                { data: 'jns_mk', name: 'jns_mk' },
                { data: 'kel_mk', name: 'kel_mk' },
                { data: 'kode_mata_kuliah', name: 'kode_mata_kuliah' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'sks_mata_kuliah', name: 'sks_mata_kuliah' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
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
                { data: 'nama_kelompok_mata_kuliah', name: 'nama_kelompok_mata_kuliah' },
                { data: 'nama_jenis_mata_kuliah', name: 'nama_jenis_mata_kuliah' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#prodi').on('change', function() {
            $('#listmatakuliah').DataTable().ajax.reload();
        });

    });
</script>
@endpush
@endsection
