@extends('layouts.dashboard.dashboard')
@section('title','Persetujuan')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Persetujuan Pengajuan Jabatan Fungsional Dosen</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="javascript:void(0);">Jabatan Fungsional Dosen</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Persetujuan</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                    <div class="row">
                        {{-- Ijazah Terakhir --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="ijazah_terakhir">Ijazah Terakhir</label>
                                <div class="input-group">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->ijazah_terakhir) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- Akreditasi Prodi --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="akreditasi_prodi">Akreditasi Prodi</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->akreditasi_prodi) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SKP --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="skp">SKP</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->skp) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bukti BKD --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="bukti_bkd">Bukti BKD</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->bukti_bkd) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Surat Pengantar --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="surat_pengantar">Surat Pengantar</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->surat_pengantar) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SK Pangkat --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sk_pangkat">SK Pangkat</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->sk_pangkat) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SK Jabatan --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sk_jabatan">SK Jabatan</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->sk_jabatan) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Sertifikasi Dosen --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="sertifikasi_dosen">Sertifikasi Dosen</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/' . $pengajuan->sertifikasi_dosen) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Submit button --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="button" class="btn btn-success approve">Setujui</button>
                            <button type="button" class="btn btn-danger reject">Tolak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function () {
        $('.approve').on('click', function () {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan menyetujui pengajuan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('dashboard.pengajuan-fungsional-dosen.approve', $pengajuan->id) }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            Swal.fire(
                                'Disetujui!',
                                'Pengajuan telah disetujui.',
                                'success'
                            ).then(() => {
                                window.location.href = "{{ route('dashboard.pengajuan-fungsional-dosen.index') }}";
                            });
                        },
                        error: function (xhr, status, error) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menyetujui pengajuan.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // reject button with reason input
        $('.reject').on('click', function () {
            Swal.fire({
                title: 'Tolak Pengajuan',
                input: 'textarea',
                inputPlaceholder: 'Alasan penolakan...',
                showCancelButton: true,
                confirmButtonText: 'Tolak',
                cancelButtonText: 'Batal',
                preConfirm: (reason) => {
                    if (!reason) {
                        Swal.showValidationMessage('Alasan penolakan tidak boleh kosong');
                    }
                    return reason;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('dashboard.pengajuan-fungsional-dosen.reject', $pengajuan->id) }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            reason: result.value
                        },
                        success: function (response) {
                            Swal.fire(
                                'Ditolak!',
                                'Pengajuan telah ditolak.',
                                'success'
                            ).then(() => {
                                window.location.href = "{{ route('dashboard.pengajuan-fungsional-dosen.index') }}";
                            });
                        },
                        error: function (xhr, status, error) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menolak pengajuan.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
@endsection
