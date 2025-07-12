@extends('layouts.dashboard.dashboard')


@section('title', 'Pengaturan Komponen')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Pengaturan Komponen</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    {{-- {{ Breadcrumbs::render('') }} --}}
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pengaturan Komponen</h4>
                                <a href="{{ route('dashboard.pengaturan.komponen.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="pengaturanKomponen" class="display text-nowrap" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Pengaturan</th>
                                                <th>Komponen</th>
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
</div>

@push('script')
<script>
    $(document).ready(function () {
        $('#pengaturanKomponen').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            responsive: true,
            pageLength: 50,
            ajax: "{{ route('pengaturan.komponen.data_table') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'jenis', name: 'jenis' },
                { data: 'komponen', name: 'komponen' }, // This will now show the correct 'komponen' values
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            rowGroup: {
                dataSrc: 'jenis'
            }
        });

        $('#pengaturanKomponen').on('click', '.delete', function () {
            let id = $(this).data('id');
            let url = '{{ route("dashboard.pengaturan.komponen.destroy", ":id") }}';
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
                                $('#pengaturanKomponen').DataTable().ajax.reload();
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
