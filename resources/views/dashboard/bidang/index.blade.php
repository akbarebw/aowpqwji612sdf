@extends('layouts.dashboard.dashboard')
@section('title','bidang')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Bidang</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('jenis-bidang') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Bidang</h4>
                            <a href="{{route('dashboard.bidang.create')}}" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="bidang" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bidang</th>
                                            <th>Jenis Bidang</th>
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
        $('#bidang').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            pagination: true,
            deferRender: true,
            responsive: true,
            pageLength: 50,
            ajax: "{{ route('bidang.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'jenis_bidang', name: 'jenis_bidang' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#bidang').on('click', '.delete', function () {
            let id = $(this).data('id');

            var url = '{{ route("dashboard.bidang.destroy", ":id")}}';
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
                                reloadTable('#bidang');
                                Swal.fire('Berhasil' , data.message, 'success');
                            } else {
                                window.location.href = "{{ route('dashboard.bidang.index') }}";
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