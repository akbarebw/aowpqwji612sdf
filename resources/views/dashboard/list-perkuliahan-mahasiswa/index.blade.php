@extends('layouts.dashboard.dashboard')
@section('title','List Perkuliahan Mahasiswa')

@section('content')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>List Perkuliahan Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('kebutuhan_khusus') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua List Perkuliahan Mahasiwa</h4>
                            <a href="{{ route('dashboard.datamaster.list.perkuliahan.mahasiswa.create') }}" class="btn btn-primary float-end">+ Add new</a>
                            {{-- <a href="#" class="btn btn-primary btn-sm">+ Tambah</a> --}}
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Prodi</label>
                                    {{ Form::select('prodi', $prodi, null, [ 'class'=>'form-control select2', 'placeholder' => 'Pilih Prodi']); }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="semester">Semester</label>
                                    <select name="semester" id="semester" class="form-control select2">
                                        <option value="" selected disabled>Pilih Semester</option>
                                        @foreach ($semester as $item)
                                            <option value="{{ $item->id_semester }}">{{ $item->nama_semester }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="pembiayaan">Pembiayaan</label>
                                    <select name="pembiayaan" id="pembiayaan" class="form-control select2">
                                        <option value="" selected disabled>Pilih Pembiayaan</option>
                                        @foreach ($pembiayaan as $item)
                                            <option value="{{ $item->id_pembiayaan }}">{{ $item->nama_pembiayaan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>NIM</th>
                                            <th>Nama Program Studi</th>
                                            <th>Angkatan</th>
                                            <th>ID Periode Masuk</th>
                                            <th>Semester</th>
                                            <th>Status Mahasiswa</th>
                                            <th>IPS</th>
                                            <th>IPK</th>
                                            <th>SKS Semester</th>
                                            <th>SKS Total</th>
                                            <th>Biaya Kuliah Semester</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
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
            pageLength: 100,
            paginate: true,
            processing: true,
            serverSide: true,
            ajax : {
                url : "{{ route('list.perkuliahan.mahasiswa.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                    d.semester = $('#semester').val();
                    d.pembiayaan = $('#pembiayaan').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'nim', name: 'nim' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'angkatan', name: 'angkatan' },
                { data: 'id_periode_masuk', name: 'id_periode_masuk' },
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'nama_status_mahasiswa', name: 'nama_status_mahasiswa' },
                { data: 'ips', name: 'ips' },
                { data: 'ipk', name: 'ipk' },
                { data: 'sks_semester', name: 'sks_semester' },
                { data: 'sks_total', name: 'sks_total' },
                { data: 'biaya_kuliah_smtr', name: 'biaya_kuliah_smtr' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#prodi').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
        $('#semester').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });
        $('#pembiayaan').on('change', function() {
            $('#data_table').DataTable().ajax.reload();
        });

    });
</script>
@endpush

@endsection