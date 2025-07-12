@extends('layouts.dashboard.dashboard')
@section('title','jabatan')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Jabatan</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('komponen') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Jabatan</h4>
                            <a href="{{route('dashboard.jabatan.create')}}" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="jabatan" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
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
    $(document).ready(function() {
        $('#jabatan').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            pagination: true,
            deferRender: true,
            responsive: true,
            pageLength: 50,
            ajax: "{{ route('jabatan.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#jabatan').on('click', '.delete', function () {
            let id = $(this).data('id');

            var url = '{{ route("dashboard.jabatan.destroy", ":id")}}';
            var url = url.replace(':id', id);
            Swal.fire({
                title: 'Anda Yakin ?',
                text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                icon: 'Warning',
                showCancelButton: 'true',
                confirmButtonText: "Ya, Hapus Data",
                denyButtonText: 'Tidak, Batalkan',
                reverseButtons: true,
                confirmbuttonColor: '#d33',
            }).then((wilDelete) => {
                if (wilDelete.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function (data) {
                            if (data.status == 'success') {
                                reloadTable('#jabatan');
                                Swal.fire('Berhasil' , data.messege, 'success');
                            } else {
                                window.location.href = "{{ route('dashboard.jabatan.index') }}";
                            }
                        }
                    });
                } else {
                    //
                }
            });
        });
    });
</script>

@endpush


@endsection
