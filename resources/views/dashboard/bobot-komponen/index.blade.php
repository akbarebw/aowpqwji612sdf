@extends('layouts.dashboard.dashboard')
@section('title','bobot-komponen')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Bobot Komponen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('bobot-komponen') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Bobot Komponen</h4>
                            <a href="{{route('dashboard.bobot.komponen.create')}}" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="bobot_komponen" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Kuliah</th>
                                            <th>Komponen</th>
                                            <th>Persentase</th>
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
        $('#bobot_komponen').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            pagination: true,
            deferRender: true,
            responsive: true,
            pageLength: 50,
            ajax: "{{ route('bobot.komponen.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_komponen', name: 'nama_komponen' },
                { data: 'persentase', name: 'persentase' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        $('#bobot_komponen').on('click', '.delete', function () {
            let id = $(this).data('id');
            let komponen_ids = $(this).data('komponen').split(',');

            var url = '{{ route("dashboard.bobot.komponen.destroy", ":id")}}';
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
                        data: {
                            komponen_ids: komponen_ids 
                        },
                        type: 'DELETE',
                        success: function (data) {
                            if (data.status == 'success') {
                                reloadTable('#bobot_komponen');
                                Swal.fire('Berhasil' , data.message, 'success');
                            } else {
                                window.location.href = "{{ route('dashboard.bobot.komponen.index') }}";
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