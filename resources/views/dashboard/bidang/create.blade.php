@extends('layouts.dashboard.dashboard')
@section('title',' bidang')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Tambah Bidang</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            
            <li class="breadcrumb-item"><a href="javascript:void(0);">Bidang</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Bidang</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
        <form action="{{route('dashboard.bidang.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Nama</label>
                                <input id="name" placeholder="Enter First Name" type="text" class="form-control" name="name" value="{{ old('name')}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Jenis Bidang</label>
                                <select name="id_jenis_bidang" id="" class="form-control">
                                    <option value="" selected>PILIH JENIS BIDANG</option>
                                    @foreach ( $jenisbidang as $jenis)
                                        <option value=" {{$jenis->id }}">{{$jenis->name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-danger light">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
