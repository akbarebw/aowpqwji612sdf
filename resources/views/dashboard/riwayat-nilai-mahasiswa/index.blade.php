@extends('layouts.dashboard.dashboard')
@section('title','Riwayat Nilai Mahasiswa')

@section('content')

<div class="container-fluid">
<div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Riwayat Nilai Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('riwayat-nilai-mahasiswa') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Riwayat Nilai Mahasiswa</h4>
                            {{-- <a href="#" class="btn btn-primary">+ Tambah</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x: scroll">
                            <table id="data_table" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Angkatan</th>
                                            <th>Nama Program Studi</th>                                         
                                            <th>Nama Mata Kuliah</th>
                                            <th>Nama Kelas Kuliah</th>
                                            <th>SKS Mata Kuliah</th>
                                            <th>Nilai Angka</th>
                                            <th>Nilai Huruf</th>
                                            <th>Nilai Indeks</th>
                                            <th>Status Sync</th>
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
    $(document).ready(function () {
        const table = $('#data_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('riwayat-nilai-mahasiswa.data_table') }}",
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nim', name: 'nim' },
                { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                { data: 'angkatan', name: 'angkatan' },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'nama_mata_kuliah', name: 'nama_mata_kuliah' },
                { data: 'nama_kelas_kuliah', name: 'nama_kelas_kuliah' },
                { data: 'sks_mata_kuliah', name: 'sks_mata_kuliah' },
                { data: 'nilai_angka', name: 'nilai_angka' },
                { data: 'nilai_huruf', name: 'nilai_huruf' },
                { data: 'nilai_indeks', name: 'nilai_indeks' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
@endsection
