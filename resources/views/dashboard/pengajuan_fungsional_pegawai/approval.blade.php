@extends('layouts.dashboard.dashboard')
@section('title','Persetujuan')
@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Persetujuan Pengajuan Jabatan Fungsional Pegawai</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="javascript:void(0);">Jabatan Fungsional Pegawai</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Persetujuan</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                    <div class="row">
                        {{-- option pangkat golongan --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="golongan_diajukan">Pangkat Golongan</label>
                                <input type="text" class="form-control" name="golongan_diajukan" id="golongan_diajukan" value="{{ $pengajuan->golonganDiajukan->kode_golongan . ' - ' . $pengajuan->golonganDiajukan->nama_pangkat }}" readonly>
                            </div>
                        </div>

                        {{-- SK Pangkat Terakhir --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="SK Pangkat Terakhir">SK Pangkat Terakhir</label>
                                <div class="input-group">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->sk_pangkat_terakhir) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- Ijazah & Transkrip Terakhir --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Ijazah & Transkrip Terakhir">Ijazah & Transkrip Terakhir</label>
                                <div class="input-group">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->ijazah_transkrip_terakhir) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- Penilaian Angka Kredit --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Penilaian Angka Kredit">Penilaian Angka Kredit</label>
                                <div class="input-group">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->penilaian_angka_kredit) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- DP3 / SKP (Penilaian Kerja) --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="DP3 / SKP (Penilaian Kerja)">DP3 / SKP (Penilaian Kerja)</label>
                                <div class="input-group">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->dp3_skp) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- Sertifikat Lulus Ujian Kompetensi --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Sertifikat Lulus Ujian Kompetensi">Sertifikat Lulus Ujian Kompetensi</label>
                                <div class="input-group">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->sertifikat_lulus_ukom) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									</div>
								</div>
                            </div>
                        </div>

                        {{-- Sertifikat Diklat --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Sertifikat Diklat">Sertifikat Diklat</label>
                                <div class="input-group">
									<div class="input-group-append">
										<a href="{{ asset('storage/' . $pengajuan->sertifikat_diklat) }}" target="__blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
                        url: "{{ route('dashboard.pengajuan-fungsional-pegawai.approve', $pengajuan->id) }}",
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
                                window.location.href = "{{ route('dashboard.pengajuan-fungsional-pegawai.index') }}";
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
                        url: "{{ route('dashboard.pengajuan-fungsional-pegawai.reject', $pengajuan->id) }}",
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
                                window.location.href = "{{ route('dashboard.pengajuan-fungsional-pegawai.index') }}";
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
