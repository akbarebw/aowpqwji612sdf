@extends('layouts.dashboard.dashboard')
@section('title','Pengajuan Jabatan Fungsional Pegawai')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Pengajuan Jabatan Fungsional Pegawai</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    {{ Breadcrumbs::render('pengajuan-fungsional-pegawai') }}
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pengajuan Jabatan Fungsional Pegawai</h4>
                                <a href="{{ route('dashboard.pengajuan-fungsional-pegawai.create') }}" class="btn btn-primary">Ajukan</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="pengajuan" class="display text-nowrap" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Golongan Diajukan</th>
                                                <th>SK Pangkat Terakhir</th>
                                                <th>Ijazah & Transkrip Terakhir</th>
                                                <th>Penilaian Angka Kredit</th>
                                                <th>DP3 / SKP</th>
                                                <th>Sertifikat Lulus Ujian Kompetensi</th>
                                                <th>Sertifikat Diklat</th>
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
            ajax: "{{ route('pengajuan-fungsional-pegawai.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'status', name: 'status' },
                { data: 'golongan_diajukan', name: 'golongan_diajukan' },
                { data: 'sk_pangkat_terakhir', name: 'sk_pangkat_terakhir' },
                { data: 'ijazah_transkrip_terakhir', name: 'ijazah_transkrip_terakhir' },
                { data: 'penilaian_angka_kredit', name: 'penilaian_angka_kredit' },
                { data: 'dp3_skp', name: 'dp3_skp' },
                { data: 'sertifikat_lulus_ukom', name: 'sertifikat_lulus_ukom' },
                { data: 'sertifikat_diklat', name: 'sertifikat_diklat' },
            ]
        });

        $('#pengajuan').on('click', '.delete', function () {
            let id = $(this).data('id');
            let url = '{{ route("dashboard.pengajuan-fungsional-pegawai.destroy", ":id") }}';
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
