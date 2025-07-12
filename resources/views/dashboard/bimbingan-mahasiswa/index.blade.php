@extends('layouts.dashboard.dashboard')
@section('title','Bimbingan Mahasiswa')
@section('content')
<div class="row">
    <div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Bimbingan Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('bimbingan-mahasiswa') }}
            </ol>
        </div>
    </div>

    <div class="row">      
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Bimbingan Mahasiswa</h4>
                            <a href="#" class="btn btn-primary">+ Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display text-nowrap" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Gender</th>
                                            <th>Education</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Joining Date</th>   
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
         $('#example3').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('dashboard.datamaster.mahasiswa.index') }}",
             columns: [
                 { data: 'profile', name: 'profile' },
                 { data: 'name', name: 'name' },
                 { data: 'department', name: 'department' },
                 { data: 'gender', name: 'gender' },
                 { data: 'education', name: 'education' },
                 { data: 'mobile', name: 'mobile' },
                 { data: 'email', name: 'email' },
                 { data: 'joining_date', name: 'joining_date' },
               { data: 'action', name: 'action', orderable: false, searchable: false },
             ]
         });
    });
</script>

@endpush
@endsection
