@extends('layouts.dashboard.dashboard')
@section('title','Pegawai')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pegawai</h4>
                            <a href="{{ route('dashboard.pegawai.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jabatan Struktural</th>
                                            <th>Jabatan Fungsional</th>
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
        $('#data_table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('pegawai.data_table') }}",
                data: function (d) {
                    // d.prodi = $('#prodi').val();
                    // d.statusmahasiswa = $('#status-mahasiswa').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama', name: 'nama' },
                { data: 'nip', name: 'nip' },
                { data: 'jabatanStruktural', name: 'jabatanStruktural' },
                { data: 'jabatanFungsional', name: 'jabatanFungsional' },

                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        // $('#prodi').on('change', function() {
        //     $('#data_table').DataTable().ajax.reload();
        // });
        // $('#status-mahasiswa').on('change', function() {
        //     $('#data_table').DataTable().ajax.reload();
        // });
    });
</script>

@endpush
@endsection
