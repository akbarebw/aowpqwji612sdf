@extends('layouts.dashboard.dashboard')
@section('title','aset')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Edit Aset</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            
            <li class="breadcrumb-item"><a href="javascript:void(0);">Aset</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Aset</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.aset.update', $aset->id) }}" method="post"enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Nama</label>
                                <input id="name" placeholder="Enter First Name" type="text" class="form-control" name="name" value="{{ old('name',$aset->name) }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="file">File</label>
                                <div class="input-group">
                                    <input id="file" placeholder="Enter First Name" type="file" class="form-control" name="file" value="{{ old('file', $aset->file)}}">
		
									<div class="input-group-append">
										<a href="{{ asset('storage/aset/' . $aset->file) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>             
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard.aset.index') }}" class="btn btn-danger light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
