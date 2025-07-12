@extends('layouts.dashboard.dashboard')
@section('title','Dosen Pengajar Kelas Kuliah')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Dosen Pengajar Kelas Kuliah</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('dosen-pengajar-kelas-kuliah') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Dosen Pengajar Kelas Kuliah</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="kelas-kuliah">Kelas Kuliah</label>
                                    <select name="kelas-kuliah" id="kelas-kuliah" class="form-control select2">
                                        <option value="" selected>Pilih Kelas Kuliah</option>
                                        @foreach ($kelaskuliah as $item)
                                            <option value="{{ $item->id_kelas_kuliah }}">{{ $item->nama_kelas_kuliah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                                <table id="dosen_pengajar_kelas_kuliah" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Nama Kelas Kuliah</th>
                                            <th>Total SKS Substansi</th>
                                            <th>Rencana Minggu Pertemuan</th>
                                            <th>Realisasi Minggu Pertemuan</th>
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

        $('#dosen_pengajar_kelas_kuliah').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            // deferRender: true,
            responsive: true,
            pageLength: 25,
            ajax : {
                url: "{{ route('dosen-pengajar-kelas-kuliah.data_table') }}",
                data: function (d) {
                    d.kelaskuliah = $('#kelas-kuliah').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nidn', name: 'nidn' },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'sks_substansi_total', name: 'sks_substansi_total' },
                { data: 'rencana_minggu_pertemuan', name: 'rencana_minggu_pertemuan' },
                { data: 'realisasi_minggu_pertemuan', name: 'realisasi_minggu_pertemuan' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#kelas-kuliah').on('change', function() {
            $('#dosen_pengajar_kelas_kuliah').DataTable().ajax.reload();
        });

    });
</script>
@endpush
@endsection
