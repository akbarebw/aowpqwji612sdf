@extends('layouts.dashboard.dashboard')
@section('title','Riwayat Pangkat Dosen')

@section('content')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Riwayat Pangkat Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('riwayat-pangkat-dosen') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Riwayat Pangkat Dosen</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>

                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="dosen">Dosen</label>
                                    <select name="dosen" id="dosen" class="form-control select2">
                                        <option value="" selected>Pilih Dosen</option>
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->id_dosen }}">{{ $item->nama_dosen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                                <table id="riwayat-pangkat-dosen" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nidn</th>
                                            <th>Nama Dosen</th>
                                            <th>Nama Pangkat Golongan</th>
                                            <th>SK Pangkat</th>
                                            <th>Tanggal Sk Pangkat</th>
                                            <th>Mulai Sk Pangkat</th>
                                            <th>Masa Kerja Dalam Tahun</th>
                                            <th>Masa Kerja Dalam Bulan</th>
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

        $('#riwayat-pangkat-dosen').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            responsive: true,
            pageLength: 50,
            ajax: {
                url: "{{ route('riwayat-pangkat-dosen.data_table') }}",
                data: function (d) {
                    d.dosen = $('#dosen').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nidn', name: 'nidn' },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'nama_pangkat_golongan', name: 'nama_pangkat_golongan' },
                { data: 'sk_pangkat', name: 'sk_pangkat' },
                { data: 'tanggal_sk_pangkat', name: 'tanggal_sk_pangkat' },
                { data: 'mulai_sk_pangkat', name: 'mulai_sk_pangkat' },
                { data: 'masa_kerja_dalam_tahun', name: 'masa_kerja_dalam_tahun' },
                { data: 'masa_kerja_dalam_bulan', name: 'masa_kerja_dalam_bulan' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#dosen').on('change', function () {
            $('#riwayat-pangkat-dosen').DataTable().ajax.reload();
        });
    });
</script>
@endpush

@endsection
