@extends('layouts.dashboard.dashboard')

@section('title','bobot komponen')

@push('css')
   <style>
     input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        .is-invalid {
            border-color: #dc3545;
        }
   </style>
@endpush

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Tambah Bobot Komponen</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.bobot.komponen.index') }}">Bobot Komponen</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('dashboard.bobot.komponen.create') }}">Tambah Bobot Komponen</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('dashboard.bobot.komponen.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Mata Kuliah</label>
                                <select id="id_matkul" class="form-control select2" name="id_matkul">
                                    <option value="">-- Pilih Mata Kuliah --</option>
                                    @foreach($listMataKuliah as $matakuliah)
                                        <option value="{{ $matakuliah->id }}" {{ old('nama_mata_kuliah') == $matakuliah->id ? 'selected' : '' }}>
                                            {{ $matakuliah->nama_program_studi }} || (Kode Matkul :  {{ $matakuliah->kode_mata_kuliah }}) {{ $matakuliah->nama_mata_kuliah }} | SKS: {{ $matakuliah->sks_mata_kuliah }}
                                        </option>
                                    @endforeach
                                </select>                            
                            </div>
                        </div>
                
                        <div class="col-md-12">
                            <table class="table table-bordered" id="table-komponen">
                                <tr>
                                    <th class="w-50">Komponen</th>
                                    <th class="w-30">Persentase</th>
                                    <th class="w-20"><button type="button" class="btn btn-primary btn-sm btn-add"><i class="fas fa-plus"></i></button></th>
                                </tr>
                                @foreach (old('id_komponen',[[]]) as $index => $oldkomponen )
                                <tr>
                                    <td>
                                        <select name="id_komponen[]" class="form-control select2">
                                            <option value="" disabled selected> Pilih Komponen</option>
                                            @foreach ($komponen as $item)
                                                <option value="{{ $item->id }}" {{ $oldkomponen == $item->id ? 'selected': '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td style="width:20%">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="persentase[]" placeholder="Persentase" value="{{ old('persentase.' . $index)}}">
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
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <a href="{{ route('dashboard.bobot.komponen.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<script type="text/javascript">
    $(document).ready(function (){
        function initializeSelect2(){
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

        $('.table').on('click', '.btn-add', function() {
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
                    <td style="width: 20%;">
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

        $('.table').on('click', '.btn-delete', function() {
            $(this).closest('tr').remove();
        });

        // Validasi total persentase saat form disubmit
        $('form').on('submit', function(e) {
            let total = 0;
            let hasEmpty = false;

            $('input[name="persentase[]"]').removeClass('is-invalid');

            $('input[name="persentase[]"]').each(function() {
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
