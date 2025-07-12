@extends('layouts.dashboard.dashboard')
@section('title','Dosen Pembimbing')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Dosen Pembimbing</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('dosen-pembimbing') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Dosen Pembimbing</h4>
                            {{-- <a href="{{ url('add-professor') }}" class="btn btn-primary">+ Add new</a> --}}
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
                            <div class="table-responsive">
                                <table id="dosenpembimbing" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Nim</th>
                                            <th>Nama Dosen</th>
                                            <th>Nidn</th>
                                            <th>Pembimbing Ke</th>
                                            <th>Jenis Aktivitas</th>
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

        $('#dosenpembimbing').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            responsive: true,
            pageLength: 50,
            ajax: {
                url: "{{ route('dosen-pembimbing.data_table') }}",
                data: function (d) {
                    d.dosen = $('#dosen').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_mahasiswa',name: 'nama_mahasiswa', },
                { data: 'nim', name: 'nim' },
                { data: 'nama_dosen' , name: 'nama_dosen'  },
                { data: 'nidn', name: 'nidn' },
                { data: 'pembimbing_ke', name: 'pembimbing_ke' },
                { data: 'jenis_aktivitas', name: 'jenis_aktivitas' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#dosen').on('change', function () {
            $('#dosenpembimbing').DataTable().ajax.reload();
        });
    });
</script>

@endpush
@endsection
