@extends('layouts.dashboard.dashboard')
@section('title','Pengajuan Jabatan Fungsional Dosen')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Pengajuan Jabatan Fungsional Dosen</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    {{ Breadcrumbs::render('pengajuan-fungsional-dosen') }}
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pengajuan Jabatan Fungsional Dosen</h4>
                                <a href="{{ route('dashboard.pengajuan-fungsional-dosen.create') }}" class="btn btn-primary">Ajukan</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="pengajuan" class="display text-nowrap" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Ijazah Terakhir</th>
                                                <th>Akreditasi Prodi</th>
                                                <th>SKP</th>
                                                <th>Bukti BKD</th>
                                                <th>Surat Pengantar</th>
                                                <th>SK Pangkat</th>
                                                <th>SK Jabatan</th>
                                                <th>Sertifikasi Dosen</th>
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
            ajax: "{{ route('pengajuan-fungsional-dosen.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'status', name: 'status' },
                { data: 'ijazah_terakhir', name: 'ijazah_terakhir' },
                { data: 'akreditasi_prodi', name: 'akreditasi_prodi' },
                { data: 'skp', name: 'skp' },
                { data: 'bukti_bkd', name: 'bukti_bkd' },
                { data: 'surat_pengantar', name: 'surat_pengantar' },
                { data: 'sk_pangkat', name: 'sk_pangkat' },
                { data: 'sk_jabatan', name: 'sk_jabatan' },
                { data: 'sertifikasi_dosen', name: 'sertifikasi_dosen' }
            ]
        });

        $('#pengajuan').on('click', '.delete', function () {
            let id = $(this).data('id');
            let url = '{{ route("dashboard.pengajuan-fungsional-dosen.destroy", ":id") }}';
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
