<div wire:ignore.self class="modal fade backdrop detail-agenda pl-20" id="detail-agenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-30" role="document">
        <div class="modal-content border-0 rounded-1">
            @if(!empty($detailAgenda))
                <div class="modal-body">
                    @if(\Carbon\Carbon::now() > $detailAgenda->schedule_date)
                        <span class="badge mb-10 p-2 bg-success text-white text-bold-500 rounded-0-5 text-uppercase">Agenda Selesai</span>
                    @else
                        <span class="badge mb-10 p-2 bg-warning text-white text-bold-500 rounded-0-5 text-uppercase">Belum dimulai</span>
                    @endif
                    <span class="badge mb-10 p-2 bg-info text-black text-bold-500 rounded-0-5 text-uppercase ml-1">
                        @if(!empty($detailAgenda['agendaCategory']))
                            {{ $detailAgenda['agendaCategory']->name ?? '' }}
                        @else
                            Agenda DPMPTSP
                        @endif
                    </span>
                    <p class="text-bold-600 font-medium-1 text-black">{{ $detailAgenda->title ?? '' }}</p>
                    @if(!empty($detailAgenda->content))
                        <div class="d-flex align-self-center mt-20">
                            <i class="ti-info-alt text-green font-small-2 mr-2 text-bold-600" style="margin-top: 0.2rem"></i>
                            <p class="font-small-2 text-gray-1 mb-0">Deskripsi Agenda</p>
                        </div>
                        <p class="font-small-3 text-black mt-1 text-bold-500 mb-0">{!! $detailAgenda->content !!}</p>
                    @endif

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex align-self-center mt-20">
                                <i class="ti-tag text-green font-small-2 mr-2 text-bold-600" style="margin-top: 0.2rem"></i>
                                <p class="font-small-2 text-gray-1 mb-0">Tipe Acara</p>
                            </div>

                            @if($detailAgenda->tipe_acara == 'offline')
                                <span class="badge red-bg-light font-small-2 text-red mt-1 text-bold-500 text-capitalize">Pertemuan {{ $detailAgenda->tipe_acara ?? '' }}</span>
                            @else
                                <span class="badge green-bg-light font-small-2 text-green mt-1 text-bold-500 text-capitalize">Pertemuan {{ $detailAgenda->tipe_acara ?? '' }}</span>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <div class="d-flex align-self-center mt-20">
                                <i class="ti-user text-green font-small-2 mr-2 text-bold-600" style="margin-top: 0.2rem"></i>
                                <p class="font-small-2 text-gray-1 mb-0">Pelaksana</p>
                            </div>
                            <p class="font-small-3 text-black mt-1 text-bold-500 mb-0">{!! $detailAgenda->pelaksana !!}</p>
                        </div>

                        <div class="col-lg-6 col-6">
                            <div class="d-flex align-self-center mt-20">
                                <i class="ti-calendar text-green font-small-2 mr-2 text-bold-600" style="margin-top: 0.2rem"></i>
                                <p class="font-small-2 text-gray-1 mb-0">Tanggal</p>
                            </div>
                            <p class="font-small-3 text-black mt-1 text-bold-500 mb-0">{{ \Carbon\Carbon::parse($detailAgenda->schedule_date)->format('l, d M Y') }}</p>
                        </div>

                        <div class="col-lg-6 col-6">
                            <div class="d-flex align-self-center mt-20">
                                <i class="ti-time text-green font-small-2 mr-2 text-bold-600" style="margin-top: 0.2rem"></i>
                                <p class="font-small-2 text-gray-1 mb-0">Waktu</p>
                            </div>
                            <p class="font-small-3 text-black mt-1 text-bold-500 text-capitalize mb-0">{{ \Carbon\Carbon::parse($detailAgenda->schedule_time)->format('h:i A') }}</p>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-flex align-self-center mt-20">
                                <i class="ti-map text-green font-small-2 mr-2 text-bold-600" style="margin-top: 0.2rem"></i>
                                <p class="font-small-2 text-gray-1 mb-0">Tempat Acara</p>
                            </div>
                            <p class="font-small-3 text-black mt-1 text-bold-500 mb-0">{!! $detailAgenda->location !!}</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-flex align-self-center mt-20">
                                <i class="ti-receipt text-green font-small-2 mr-2 text-bold-600" style="margin-top: 0.2rem"></i>
                                <p class="font-small-2 text-gray-1 mb-0">Dihadiri</p>
                            </div>
                            <div class="text-black font-small-3">
                                {!! $detailAgenda->partisipasi !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-left">
                        <button data-dismiss="modal" class="btn btn-outline-danger text-bold-500 font-small-2 rounded-0-5">Tutup</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
