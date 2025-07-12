@extends('layouts.dashboard.dashboard')
@section('title','List Skala Nilai Prodi')
@section('content')


<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data List Skala Nilai Prodi</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{-- {{ Breadcrumbs::render('list-skala-nilai-prodi') }} --}}
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua List Skala Nilai Prodi</h4>
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
                                            <option value="{{ $item->id_prodi }}">{{ $item->nama_program_studi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="mata-kuliah">Mata Kuliah</label>
                                    <select name="mata-kuliah" id="mata-kuliah" class="form-control select2">
                                        <option value="" selected>Pilih Mata Kuliah</option>
                                        @foreach ($matkul as $item)
                                            <option value="{{ $item->id_matkul }}">{{ $item->nama_mata_kuliah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="list_skala_nilai_prodi" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Program Studi</th>
                                            <th>Nilai huruf</th>
                                            <th>Nilai indeks</th>
                                            <th>Bobot minimum</th>
                                            <th>Bobot maksimum</th>
                                            <th>Tanggal mulai efektif</th>
                                            <th>Tanggal akhir efektif</th>
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
        $('.select2').select2();

        $('#list_skala_nilai_prodi').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            pageLength: 50,
            ajax : {
                url: "{{ route('list-skala-nilai-prodi.data_table') }}",
                data: function (d) {
                    d.prodi = $('#prodi').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex',name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_program_studi', name: 'nama_program_studi' },
                { data: 'nilai_huruf', name: 'nilai_huruf' },
                { data: 'nilai_indeks', name: 'nilai_indeks' },
                { data: 'bobot_minimum', name: 'bobot_minimum' },
                { data: 'bobot_maksimum', name: 'bobot_maksimum' },
                { data: 'tanggal_mulai_efektif', name: 'tanggal_mulai_efektif' },
                { data: 'tanggal_akhir_efektif', name: 'tanggal_akhir_efektif' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('#prodi').on('change', function() {
            $('#list_skala_nilai_prodi').DataTable().ajax.reload();
        });

    });
</script>

@endpush
@endsection
