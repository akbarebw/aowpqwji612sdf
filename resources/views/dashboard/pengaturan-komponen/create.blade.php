@extends('layouts.dashboard.dashboard')
@section('title','pengaturan komponen')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Tambah Pengaturan</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('dashboard.pengaturan.komponen.store')}}" method="post"enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="" selected disabled>--- Pilih Jenis ---</option>
                                <option value="teori">Teori</option>
                                <option value="praktek">Praktek</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered" id="table-komponen">
                            <tr>
                                <th class="w-50">Komponen</th>
                                <th class="w-20"><button type="button" class="btn btn-primary btn-sm btn-add"><i class="fas fa-plus"></i></button></th>
                            </tr>
                            @foreach (old('komponen_id',[[]]) as $index => $oldkomponen )
                            <tr>
                                <td>
                                    <select name="komponen_id[]" class="form-control select2">
                                        <option value="" disabled selected> Pilih Komponen</option>
                                        @foreach ($komponen as $item)
                                            <option value="{{ $item->id }}" {{ $oldkomponen == $item->id ? 'selected': '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete">-</button>
                                    <button type="button" class="btn btn-primary btn-sm btn-add">+</button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="bobot_standar">Bobot Standar</label>
                            <input id="bobot_standar" placeholder="Masukan Bobot Standar Setiap Item" type="number" class="form-control" name="bobot_standar" value="{{ old('bobot_standar')}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="{{ route('dashboard.pengaturan.komponen.index') }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </form>
                </div>
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
            let selectedKomponen = $('select[name="komponen_id[]"]').map(function() {
                return $(this).val();
            }).get();

            $('select[name="komponen_id[]"]').each(function() {
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
                        <select name="komponen_id[]" class="form-control select2">
                            <option disabled selected>Pilih Komponen</option>
                            @foreach ($komponen as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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


    });
</script>
@endpush
@endsection
