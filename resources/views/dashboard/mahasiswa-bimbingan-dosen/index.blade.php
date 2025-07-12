@extends('layouts.dashboard.dashboard')
@section('title','Mahasiswa Bimbingan Dosen')
@section('content')


<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Mahasiswa Bimbingan Dosen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('Mahasiswa Bimbingan Dosen') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Mahasiswa Bimbingan Dosen</h4>
                            <a href="#" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="mahasiswa_bimbingan_dosen" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Nama Kategori Kegiatan</th>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Pembimbing Ke</th>
                                            <th>Aksi</th>
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
        $('#mahasiswa_bimbingan_dosen').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            pageLength: 50,
            ajax: "{{ route('mahasiswa-bimbingan-dosen.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'judul', name: 'judul' },
                { data: 'nama_kategori_kegiatan', name: 'nama_kategori_kegiatan' },
                { data: 'nidn', name: 'nidn' },
                { data: 'nama_dosen', name: 'nama_dosen' },
                { data: 'pembimbing_ke', name: 'pembimbing_ke' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>

@endpush
@endsection
