@extends('layouts.dashboard.dashboard')
@section('title','Pengajuan Jabatan Struktural Pegawai')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Pengajuan Jabatan Struktural Pegawai</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                {{ Breadcrumbs::render('pengajuan-struktural-pegawai') }}
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pengajuan Jabatan Struktural Pegawai</h4>
                                <a href="{{ route('dashboard.pengajuan-struktural-pegawai.create') }}" class="btn btn-primary">Ajukan</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="pengajuan" class="display text-nowrap" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Diajukan Oleh</th>
                                                <th>Jabatan Sebelumnya</th>
                                                <th>Jabatan Diajukan</th>
                                                <th>SK Pangkat Terakhir</th>
                                                <th>SK Jabatan Struktural</th>
                                                <th>SKP</th>
                                                <th>Ijazah Transkrip Terakhir</th>
                                                <th>Kartu Pegawai</th>
                                                <th>SK CPNS</th>
                                                <th>Surat Pengantar</th>
                                                <th>Dokumen Terkait</th>
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
</div>

@push('script')
<script>
    $(document).ready(function () {
        $('#pengajuan').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            responsive: true,
            pageLength: 50,
            ajax: "{{ route('pengajuan-struktural-pegawai.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'status', name: 'status' },
                { data: 'created_by', name: 'created_by' },
                { data: 'jabatan_sebelumnya', name: 'jabatan_sebelumnya' },
                { data: 'jabatan_diajukan', name: 'jabatan_diajukan' },
                { data: 'sk_pangkat_terakhir', name: 'sk_pangkat_terakhir' },
                { data: 'sk_jabatan_struktural', name: 'sk_jabatan_struktural' },
                { data: 'skp', name: 'skp' },
                { data: 'ijazah_transkrip_terakhir', name: 'ijazah_transkrip_terakhir' },
                { data: 'kartu_pegawai', name: 'kartu_pegawai' },
                { data: 'sk_cpns', name: 'sk_cpns' },
                { data: 'surat_pengantar', name: 'surat_pengantar' },
                { data: 'dokumen_terkait', name: 'dokumen_terkait' }
            ]
        });

        $('#pengajuan').on('click', '.delete', function () {
            let id = $(this).data('id');
            let url = '{{ route("dashboard.pengajuan-struktural-pegawai.destroy", ":id") }}';
            url = url.replace(':id', id);

            Swal.fire({
                title: 'Anda Yakin?',
                text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus Data",
                cancelButtonText: 'Batal',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function (data) {
                            if (data.status === 'success') {
                                $('#pengajuan').DataTable().ajax.reload();
                                Swal.fire('Berhasil', data.message, 'success');
                            } else {
                                Swal.fire('Gagal', data.message, 'error');
                            }
                        }
                    });
                }
            });
        });
    });
</script>
@endpush

@endsection
