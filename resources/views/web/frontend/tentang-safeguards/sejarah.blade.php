@extends('web.frontend.layouts.app')

@section('content')

    <section class="page-title bg-overlay-white-50 parallax" data-jarallax="{&quot;speed&quot;: 0.6}" style="background-image: url({{ asset('image/banner-homepage.jpeg')}})">
        <div class="slider-content-middle">
            <div  class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="fature-info p-5">
                        <div class="row justify-content-center">
                            <div class="text-center">
                                <h1 class="text-orange" style="text-shadow: 1px 2px 3px #c03c00">Sejarah Safeguards</h1>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;"><div style="background-position: 50% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(&quot;file:///Users/britech/Downloads/Telegram%20Desktop/main-files/Template/images/bg/02.jpg&quot;); position: fixed; top: 0px; left: 0px; width: 1280px; height: 466.6px; overflow: hidden; pointer-events: none; margin-top: 19.2px; transform: translate3d(0px, -147px, 0px);"></div></div>

    </section>

    <section class="our-history white-bg page-section-ptb" >
        <div class="container">
            <div class="center p-5">
                <img class="w-100 p-5" src="{{ asset('image/sejarah-img.jpeg')}}">
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-justify">
                        {{--<h2 class="title-effect">Indonesia SIS</h2>--}}
                        <p>Keputusan COP-16, sebagaimana tertuang dalam Annex I Paragraf 2 Decision 1/CP 16, mengamanatkan kepada negara pihak yang melaksanakan REDD+ untuk membangun sistem penyediaan informasi mengenai implementasi atau bagaimana safeguardsditangani dan dihormati.Keputusan COP pada dasarnya menyediakan panduan umum untuk negara pihak (parties), dan dijelaskan dalam keputusan tersebut bahwa pembangunan sistem ini disesuaikan dengan kondisi dan kapabilitas nasional dan menghormati kedaulatan masing-masing negara. Oleh karena itu negara pihak perlu menerjemahkan panduan tersebut dalam konteks nasional.
                            Dalam rangka melaksanakan amanat Keputusan COP-16 tersebut, selama tahun 2011 dan 2012 telah dilakukan serangkaian proses multipihak oleh Pusat Standarisasi dan Lingkungan – Kementerian Kehutanan, untuk membangun SIS REDD+ di Indonesia. Proses multipihak tersebut bertujuan untuk : (1) menterjemahkan safeguards REDD+ pada Keputusan COP-16 ke dalam konteks nasional, (2) melakukan analisis terhadap instrumen kebijakan dan instrumen lain yang terkait dengan safeguards REDD+ pada Keputusan COP-16, (3) mengidentifikasi struktur dan mekanisme sistem informasi implementasi safeguards dalam REDD+ yang paling sesuai bagi Indonesia, (4) menyusun rancangan kelembagaan SIS-REDD+, (5) menentukan Prinsip, Criteria dan Indikator, dengan mempertimbangkan hasil analisis butir (2) dan, (6) menentukan alat penilai pelaksanaan safeguards dalam SIS-REDD+ di Indonesia, Berdasarkan Keputusan COP-17, sistem penyediaan informasi tentang implementasi safeguards diisyaratkan memenuhi prinsip-prinsip sebagai berikut :</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="timeline-dots"></div>
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge"><p class="theme-color">01</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-body text-justify">
                                    <p>Konsisten dengan guidance pada Keputusan COP-16 Annex I Paragraph 1.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge"><p class="theme-color">02</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-body text-justify">
                                    <p>Informasi yang transparan dan konsisten yang dapat diakses oleh semua pihak dan di-update secara teratur.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge"><p class="theme-color">03</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <p>Sistem yang transparan dan fleksibel untuk penyempurnaan dari waktu ke waktu.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge"><p class="theme-color">04</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-body text-justify">
                                    <p>Informasi tentang bagaimana ketujuh safeguards dilaksanakan.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge"><p class="theme-color">05</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-body text-justify">
                                    <p>Country-driven dan diimplementasikan di tingkat nasional.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge"><p class="theme-color">06</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-body text-justify">
                                    <p>Dibangun dengan basis sistem yang ada.</p>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-arrow"><i class="fa fa-chevron-down"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0"
        nonce="NlKpG7xt"></script>


@endsection
