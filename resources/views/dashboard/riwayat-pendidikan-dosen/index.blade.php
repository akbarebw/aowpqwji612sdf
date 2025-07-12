@extends('layouts.dashboard.dashboard')
@section('title','Riwayat Pendidikan Dosen')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Riwayat Pendidikan Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('riwayat-pendidikan-dosen') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Riwayat Pendidikan Dosen</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        {{-- <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="jenjang-pendidikan">Jenjang Pendidikan</label>
                                    <select name="jenjang-pendidikan" id="jenjang-pendidikan" class="form-control select2">
                                        <option value="" selected>Pilih Jenjang Pendidikan</option>
                                        @foreach ($jenjangpendidikan as $item)
                                            <option value="{{ $item->id_jenjang_didik }}">{{ $item->nama_jenjang_didik }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="riwayat_pendidikan_dosen" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>nidn</th>
                                            <th>Nama Dosen</th>
                                            <th>Nama Bidang Studi</th>
                                            <th>Nama Jenjang Pendidikan</th>
                                            <th>Nama Gelar Akademik</th>
                                            <th>Nama Perguruan Tinggi</th>
                                            <th>Fakultas</th>
                                            <th>Tahun Lulus</th>
                                            <th>SKS Lulus</th>
                                            <th>IPK</th>
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

        $('#riwayat_pendidikan_dosen').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            // deferRender: true,
            responsive: true,
            pageLength: 25,
            ajax : {
                url: "{{ route('riwayat-pendidikan-dosen.data_table') }}",
                data: function (d) {
                    // d.jenjangpendidikan = $('#jenjang-pendidikan').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nidn', name: 'nidn' },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'nama_bidang_studi', name: 'nama_bidang_studi' },
                { data: 'nama_jenjang_pendidikan', name: 'nama_jenjang_pendidikan' },
                { data: 'nama_gelar_akademik', name: 'nama_gelar_akademik' },
                { data: 'nama_perguruan_tinggi', name: 'nama_perguruan_tinggi' },
                { data: 'fakultas', name: 'fakultas' },
                { data: 'tahun_lulus', name: 'tahun_lulus' },
                { data: 'sks_lulus', name: 'sks_lulus' },
                { data: 'ipk', name: 'ipk' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        // $('#jenjang-pendidikan').on('change', function() {
        //     $('#riwayat_pendidikan_dosen').DataTable().ajax.reload();
        // });

    });
</script>
@endpush
@endsection
