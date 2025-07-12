@extends('layouts.dashboard.dashboard')

@section('title','Edit Bobot Komponen')

@push('css')
   <style>
     input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] { -moz-appearance: textfield; }
        .is-invalid { border-color: #dc3545; }
   </style>
@endpush

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Edit Bobot Komponen</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.bobot.komponen.update', $matakuliah->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="id_matkul">Mata Kuliah</label>
                        <select name="id_matkul" class="form-control select2">
                            <option value="{{ $matakuliah->id }}" >
                                ( {{ $matakuliah->nama_program_studi }}) Kode:{{ $matakuliah->kode_mata_kuliah }} || {{ $matakuliah->nama_mata_kuliah }} | {{ $matakuliah->sks_mata_kuliah }} 
                            </option>
                            @foreach($listMataKuliah as $matakuliah)
                                <option value="{{ $matakuliah->id }}" {{ old('nama_mata_kuliah') == $matakuliah->id ? 'selected' : '' }}>
                                    ( {{ $matakuliah->nama_program_studi }}) Kode:{{ $matakuliah->kode_mata_kuliah }} || {{ $matakuliah->nama_mata_kuliah }} | {{ $matakuliah->sks_mata_kuliah }} 
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="table-komponen">
                            <tr>
                                <th>Komponen</th>
                                <th>Persentase</th>
                                <th><button type="button" class="btn btn-primary btn-sm btn-add"><i class="fas fa-plus"></i></button></th>
                            </tr>

                            @foreach ($bobotkomponen as $index => $item)
                            <tr>
                                <td>
                                    <select name="id_komponen[]" class="form-control select2">
                                        <option disabled selected>Pilih Komponen</option>
                                        @foreach ($komponen as $kom)
                                            <option value="{{ $kom->id }}" {{ $kom->id == $item->id_komponen ? 'selected' : '' }}>
                                                {{ $kom->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="persentase[]" value="{{ $item->persentase }}" placeholder="Persentase">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete">-</button>
                                    <button type="button" class="btn btn-primary btn-sm btn-add">+</button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="form-group mt-3">
                        <a href="{{ route('dashboard.bobot.komponen.index') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function () {
        function initializeSelect2() {
            $(".select2").select2();
        }
        initializeSelect2();

        function updateKomponenSelect() {
            let selectedKomponen = $('select[name="id_komponen[]"]').map(function() {
                return $(this).val();
            }).get();

            $('select[name="id_komponen[]"]').each(function() {
                let currentSelect = $(this);
                currentSelect.find('option').each(function() {
                    let optionValue = $(this).val();
                    if (selectedKomponen.includes(optionValue) && currentSelect.val() != optionValue) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });
            });
        }


        $('.table').on('click', '.btn-add', function () {
            $('#table-komponen').append(
                `<tr>
                    <td>
                        <select name="id_komponen[]" class="form-control select2">
                            <option disabled selected>Pilih Komponen</option>
                            @foreach ($komponen as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="input-group">
                            <input type="number" class="form-control" name="persentase[]" placeholder="Persentase">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm btn-delete">-</button>
                        <button type="button" class="btn btn-primary btn-sm btn-add">+</button>
                    </td>
                </tr>`
            );
            initializeSelect2();
            updateKomponenSelect();
        });

        $('.table').on('click', '.btn-delete', function () {
            $(this).closest('tr').remove();
        });

        $('form').on('submit', function (e) {
            let total = 0;
            let hasEmpty = false;

            $('input[name="persentase[]"]').removeClass('is-invalid');

            $('input[name="persentase[]"]').each(function () {
                let val = parseFloat($(this).val());
                if ($(this).val() === '' || isNaN(val)) {
                    hasEmpty = true;
                    $(this).addClass('is-invalid');
                } else {
                    total += val;
                }
            });

            if (hasEmpty) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Persentase tidak boleh kosong!',
                });
                return;
            }

            if (total !== 100) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Total persentase harus 100%. Saat ini: ' + total + '%',
                });
            }
        });
    });
</script>
@endpush

@endsection
