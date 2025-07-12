@extends('layouts.dashboard.dashboard')
@section('title','Periode Perkuliahan')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Periode Perkuliahan</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('periode-perkuliahan') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Data Periode Perkuliahan</h4>
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
                            <table id="periodeperkuliahan" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>                                      
                                            <th>Nama Program Studi</th>
                                            <th>Nama Semester</th>
                                            <th>Jumlah Target Mahasiswa Baru</th>
                                            <th>Tanggal Awal Perkuliahan</th>
                                            <th>Tanggal Akhir Perkuliahan</th>
                                            <th>Calon Ikut Seleksi</th>
                                            <th>Calon Lulus Seleksi</th>
                                            <th>Dafatar Sbg Mahasiswa</th>
                                            <th>Pst Undur Diri</th>
                                            <th>Jml Mgu Kul</th>
                                            <th>Metode Kul</th>
                                            <th>Metode Kul Eks</th>
                                            <th>Tgl Create</th>
                                            <th>Last Update</th>
                                            <th>Status Sync</th>
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

        $('#periodeperkuliahan').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            // deferRender: true,
            responsive: true,
            pageLength: 50,
            ajax : {
                url: "{{ route('periode-perkuliahan.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'jumlah_target_mahasiswa_baru', name: 'jumlah_target_mahasiswa_baru' },
                { data: 'tanggal_awal_perkuliahan', name: 'tanggal_awal_perkuliahan' },
                { data: 'tanggal_akhir_perkuliahan', name: 'tanggal_akhir_perkuliahan' },
                { data: 'calon_ikut_seleksi', name: 'calon_ikut_seleksi' },
                { data: 'calon_lulus_seleksi', name: 'calon_lulus_seleksi' },
                { data: 'daftar_sbg_mhs', name: 'daftar_sbg_mhs' },
                { data: 'pst_undur_diri', name: 'pst_undur_diri' },
                { data: 'jml_mgu_kul', name: 'jml_mgu_kul' },
                { data: 'metode_kul', name: 'metode_kul' },
                { data: 'metode_kul_eks', name: 'metode_kul_eks' },
                { data: 'tgl_create', name: 'tgl_create' },
                { data: 'last_update', name: 'last_update' },
                { data: 'status_sync', name: 'status_sync' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#prodi').on('change', function() {
            $('#periodeperkuliahan').DataTable().ajax.reload();
        });
    });
</script>
@endpush
@endsection
