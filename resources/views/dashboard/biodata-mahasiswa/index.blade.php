@extends('layouts.dashboard.dashboard')
@section('title','Biodata Mahasiswa')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Biodata Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('biodata-mahasiswa') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Biodata Mahasiswa</h4>
                            {{-- <a href="{{ url('add-professor') }}" class="btn btn-primary">+ Add new</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Nama Agama</th>
                                            <th>Nik</th>
                                            <th>Nisn</th>
                                            <th>Npwp</th>
                                            <th>Kewarganegaraan</th>
                                            <th>Jalan</th>
                                            <th>Dusun</th>
                                            <th>Rt</th>
                                            <th>Rw</th>
                                            <th>Kelurahan</th>
                                            <th>Kode Pos</th>
                                            <th>Nama Wilayah</th>
                                            <th>Nama Jenis Tinggal</th>
                                            <th>Nama Alat Transportasi </th>
                                            <th>Telepon</th>
                                            <th>Handphone</th>
                                            <th>Email</th>
                                            <th>Penerima Kps</th>
                                            <th>Nomor Kps</th>
                                            <th>Nik Ayah</th>
                                            <th>Nama Ayah</th>
                                            <th>Tanggal Lahir Ayah</th>
                                            <th>Nama Pendidikan Ayah</th>
                                            <th>Nama Pekerjaan Ayah</th>
                                            <th>Nama Penghasilan Ayah</th>
                                            <th>Nik Ibu</th>
                                            <th>Nama Ibu Kandung</th>
                                            <th>Tanggal Lahir Ibu</th>
                                            <th>Nama Pendidikan Ibu</th>
                                            <th>Nama Pekerjaan Ibu</th>
                                            <th>Nama Penghasilan Ibu</th>
                                            <th>Nama Wali</th>
                                            <th>Tanggal Lahir Wali</th>
                                            <th>Nama Pendidikan Wali</th>
                                            <th>Nama Pekerjaan Wali</th>
                                            <th>Nama Penghasilan Wali</th>
                                            <th>Nama Kebutuhan Khusus Mahasiswa</th>
                                            <th>Nama Kebutuhan Khusus Ayah</th>
                                            <th>Nama Nama Kebutuhan Khusus Ibu</th>
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
        const table = $('#data_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('biodata-mahasiswa.data_table') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'tempat_lahir', name: 'tempat_lahir' },
                { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                { data: 'nama_agama', name: 'nama_agama' },
                { data: 'nik', name: 'nik' },
                { data: 'nisn', name: 'nisn' },
                { data: 'npwp', name: 'npwp' },
                { data: 'kewarganegaraan', name: 'kewarganegaraan' },
                { data: 'jalan', name: 'jalan' },
                { data: 'dusun', name: 'dusun' },
                { data: 'rt', name: 'rt' },
                { data: 'rw', name: 'rw' },
                { data: 'kelurahan', name: 'kelurahan' },
                { data: 'kode_pos', name: 'kode_pos' },
                { data: 'nama_wilayah', name: 'nama_wilayah' },
                { data: 'nama_jenis_tinggal', name: 'nama_jenis_tinggal' },
                { data: 'nama_alat_transportasi', name: 'nama_alat_transportasi' },
                { data: 'telepon', name: 'telepon' },
                { data: 'handphone', name: 'handphone' },
                { data: 'email', name: 'email' },
                { data: 'penerima_kps', name: 'penerima_kps' },
                { data: 'nomor_kps', name: 'nomor_kps' },
                { data: 'nik_ayah', name: 'nik_ayah' },
                { data: 'nama_ayah', name: 'nama_ayah' },
                { data: 'tanggal_lahir_ayah', name: 'tanggal_lahir_ayah' },
                { data: 'nama_pendidikan_ayah', name: 'nama_pendidikan_ayah' },
                { data: 'nama_pekerjaan_ayah', name: 'nama_pekerjaan_ayah' },
                { data: 'nama_penghasilan_ayah', name: 'nama_penghasilan_ayah' },
                { data: 'nik_ibu', name: 'nik_ibu' },
                { data: 'nama_ibu_kandung', name: 'nama_ibu_kandung' },
                { data: 'tanggal_lahir_ibu', name: 'tanggal_lahir_ibu' },
                { data: 'nama_pendidikan_ibu', name: 'nama_pendidikan_ibu' },
                { data: 'nama_pekerjaan_ibu', name: 'nama_pekerjaan_ibu' },
                { data: 'nama_penghasilan_ibu', name: 'nama_penghasilan_ibu' },
                { data: 'nama_wali', name: 'nama_wali' },
                { data: 'tanggal_lahir_wali', name: 'tanggal_lahir_wali' },
                { data: 'nama_pendidikan_wali', name: 'nama_pendidikan_wali' },
                { data: 'nama_pekerjaan_wali', name: 'nama_pekerjaan_wali' },
                { data: 'nama_penghasilan_wali', name: 'nama_penghasilan_wali' },
                { data: 'nama_kebutuhan_khusus_mahasiswa', name: 'nama_kebutuhan_khusus_mahasiswa' },
                { data: 'nama_kebutuhan_khusus_ayah', name: 'nama_kebutuhan_khusus_ayah' },
                { data: 'nama_kebutuhan_khusus_ibu', name: 'nama_kebutuhan_khusus_ibu' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>

@endpush
@endsection
