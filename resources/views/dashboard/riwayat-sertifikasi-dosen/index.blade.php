@extends('layouts.dashboard.dashboard')
@section('title','Riwayat Sertifikasi Dosen')

@section('content')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Riwayat Sertifikasi Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
            {{ Breadcrumbs::render('riwayat-sertifikasi-dosen') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Semua Riwayat Sertifikasi Dosen</h4>
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
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nidn</th>
                                            <th>Nama Dosen</th>
                                            <th>Nomor Peserta</th>
                                            <th>Nama Bidang Studi</th>
                                            <th>Nama Jenis Sertifikasi</th>
                                            <th>Nama Lengkap Iptek</th>
                                            <th>Tahun Sertifikasi</th>
                                            <th>SK Sertifikasi</th>
                                            <th>Action</th>
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
    $(document).ready(function () {
        $('.select2').select2();

        $('#data_table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            // deferRender: true,
            responsive: true,
            pageLength: 50,
            ajax : {
                url: "{{ route('riwayat-sertifikasi-dosen.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nidn',name: 'nidn', },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'nomor_peserta', name: 'nomor_peserta' },
                { data: 'nama_bidang_studi', name: 'nama_bidang_studi' },
                { data: 'nama_jenis_sertifikasi', name: 'nama_jenis_sertifikasi' },
                { data: 'tahun_sertifikasi', name: 'tahun_sertifikasi' },
                { data: 'sk_sertifikasi', name: 'sk_sertifikasi' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#prodi').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
    });
</script>
@endpush
@endsection