@extends('layouts.dashboard.dashboard')
@section('title','Biodata Dosen')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Biodata Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('biodata-dosen') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Biodata Dosen</h4>
                            <a href="#" class="btn btn-primary">+ Tambah</a>
                        </div>

                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="status-keaktifan-pegawai">Status Keaktifan Pegawai</label>
                                    <select name="status-keaktifan-pegawai" id="status-keaktifan-pegawai" class="form-control select2">
                                        <option value="" selected>Pilih Status</option>
                                        @foreach ($statuskeaktifanpegawai as $item)
                                            <option value="{{ $item->id_status_aktif }}">{{ $item->nama_status_aktif}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="pangkat-golongan">Pangkat Golongan</label>
                                    <select name="pangkat-golongan" id="pangkat-golongan" class="form-control select2">
                                        <option value="" selected>Pilih Pangkat/Golongan </option>
                                        @foreach ($pangkatgolongan as $item)
                                            <option value="{{ $item->id_pangkat_golongan }}">{{ $item->nama_pangkat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="biodata-dosen_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Nama Dosen</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nama Agama</th>
                                            <th>Nama Status Aktif</th>
                                            <th>Nidn</th>
                                            <th>Nama Ibu Kandung</th>
                                            <th>Nik</th>
                                            <th>Nip</th>
                                            <th>Npwp</th>
                                            <th>Nama Jenis Sdm</th>
                                            <th>Tanggal SK CPNS</th>
                                            <th>No SK Pengangkatan</th>
                                            <th>Mulai SK Pengangkatan</th>
                                            <th>Nama Lembaga Pengangkatan</th>
                                            <th>Nama Pangkat Golongan</th>
                                            <th>Nama Sumber Gaji</th>
                                            <th>Jalan</th>
                                            <th>Dusun</th>
                                            <th>RT</th>
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

        $('#biodata-dosen_table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('biodata-dosen.data_table') }}",
                data: function (d) {
                    d.statuskeaktifanpegawai = $('#status-keaktifan-pegawai').val();
                    d.pangkatgolongan = $('#pangkat-golongan').val();
                }
            },
            columns: [
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'tempat_lahir', name: 'tempat_lahir' },
                { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'nama_agama', name: 'nama_agama' },
                { data: 'nama_status_aktif', name: 'nama_status_aktif' },
                { data: 'nidn', name: 'nidn' },
                { data: 'nama_ibu_kandung', name: 'nama_ibu_kandung' },
                { data: 'nik', name: 'nik' },
                { data: 'nip', name: 'nip' },
                { data: 'npwp', name: 'npwp' },
                { data: 'nama_jenis_sdm', name: 'nama_jenis_sdm' },
                { data: 'tanggal_sk_cpns', name: 'tanggal_sk_cpns' },
                { data: 'no_sk_pengangkatan', name: 'no_sk_pengangkatan' },
                { data:'mulai_sk_pengangkatan', name:'mulai_sk_pengangkatan' },
                { data: 'nama_lembaga_pengangkatan', name: 'nama_lembaga_pengangkatan' },
                { data: 'nama_pangkat_golongan', name: 'nama_pangkat_golongan' },
                { data: 'nama_sumber_gaji', name: 'nama_sumber_gaji' },
                { data: 'jalan', name: 'jalan' },
                { data: 'dusun', name: 'dusun' },
                { data: 'rt', name: 'rt' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#status-keaktifan-pegawai_table').on('change', function() {
            $('#biodata-dosen_table').DataTable().ajax.reload();
        });
        $('#pangkat-golongan_table').on('change', function() {
            $('#biodata-dosen_table').DataTable().ajax.reload();
        });
    });
</script>

@endpush
@endsection
