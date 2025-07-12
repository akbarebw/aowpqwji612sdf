@extends('layouts.dashboard.dashboard')
@section('title','Rekap KHS Mahasiswa')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Rekap KHS Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- {{ Breadcrumbs::render('mahasiswa') }} -->
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Rekap KHS Mahasiswa</h4>
                            <a href="#" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="row m-2">
                            <h4>Filter</h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="prodi">Prodi</label>
                                    <select name="prodi" id="prodi" class="form-control select2">
                                        <option value="" selected>Pilih Prodi</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id_prodi }}">{{ $item->nama_program_studi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="rekap_khs_mahasiswa_table" class="display text-nowrap table-fixed" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>                                         
                                            <th>NIM</th>
                                            <th>Nama Prodi</th>
                                            <th>angkatan</th>
                                            <th>nama periode</th>
                                            <th>nama mata kuliah</th>
                                            <th>sks mata kuliah</th>
                                            <th>nilai angka</th>
                                            <th>nilai huruf</th>
                                            <th>nilai indeks</th>
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
  
        $('#rekap_khs_mahasiswa_table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url: "{{ route('rekap.khs.mahasiswa.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'nim', name: 'nim' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'angkatan', name: 'angkatan' },
                { data: 'nama_periode', name: 'nama_periode' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'sks_mata_kuliah', name: 'sks_mata_kuliah' },
                { data: 'nilai_angka', name: 'nilai_angka' },
                { data: 'nilai_huruf', name: 'nilai_huruf' },
                { data: 'nilai_indeks', name: 'nilai_indeks' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
        
        $('#prodi').on('change', function() {
            $('#rekap_khs_mahasiswa_table').DataTable().ajax.reload();
        });
    });
</script>

@endpush
@endsection
