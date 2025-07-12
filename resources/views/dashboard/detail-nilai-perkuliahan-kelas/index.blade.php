@extends('layouts.dashboard.dashboard')
@section('title','Detail Nilai Perkuliahan')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Detail Nilai Perkuliahan</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('detail nilai perkuliahan') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Detail Nilai Perkuliahan</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                                <table id="detail_nilai_perkuliahan_kelas" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Program Studi</th>                                         
                                            <th>Semester</th>
                                            <th>Kode Matakuliah</th>
                                            <th>Nama Matakuliah</th>
                                            <th>SKS</th>
                                            <th>Kelas</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jurusan</th>
                                            <th>Angkatan</th>
                                            <th>Nilai Angka</th>
                                            <th>Nilai Indeks</th>
                                            <th>Nilai Huruf</th>
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
        $('#detail_nilai_perkuliahan_kelas').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            // deferRender: true,
            responsive: true,
            pageLength: 50,
            ajax: "{{ route('detail-nilai-perkuliahan-kelas.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'kode_mata_kuliah', name: 'kode_mata_kuliah' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'sks_mata_kuliah', name: 'sks_mata_kuliah' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'nim', name: 'nim' },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'jurusan', name: 'jurusan' },
                { data: 'angkatan', name: 'angkatan' },
                { data: 'nilai_angka', name: 'nilai_angka' },
                { data: 'nilai_indeks', name: 'nilai_indeks' },
                { data: 'nilai_huruf', name: 'nilai_huruf' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
@endsection
