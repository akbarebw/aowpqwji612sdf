@extends('layouts.dashboard.dashboard')
@section('title','Export Data Matkul Prodi')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Export Data Matkul Prodi</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('export-data-matkul-prodi') }}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Export Data Matkul Prodi</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>

                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="listmatakuliah">List Matakuliah</label>
                                    <select name="list-mata-kuliah" id="list-mata-kuliah" class="form-control select2">
                                        <option value="" selected>Pilih Matakuliah</option>
                                        @foreach ($listmatakuliah as $item)
                                            <option value="{{ $item->nama_mata_kuliah }}">{{ $item->nama_mata_kuliah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                            <table id="export-data-matkul-prodi_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Nama Program Studi</th>
                                            <th>Sks Mata Kuliah</th>
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
        $('.select2').select2();

        $('#export-data-matkul-prodi_table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('export-data-matkul-prodi.data_table') }}",
                data: function (d) {
                    d.listmatakuliah = $('#list-mata-kuliah').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'kode_mata_kuliah', name: 'kode_mata_kuliah' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'sks_mata_kuliah', name: 'sks_mata_kuliah' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#list-mata-kuliah').on('change', function() {
            $('#export-data-matkul-prodi_table').DataTable().ajax.reload();
        });
    });
</script>
@endpush
@endsection
