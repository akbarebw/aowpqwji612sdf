@extends('web.frontend.layouts.app')

@section('content')

    <section class="page-title bg-overlay-white-50 parallax" data-jarallax="{&quot;speed&quot;: 0.6}" style="background-image: url({{ asset('image/banner-homepage.jpeg')}})">
        <div class="slider-content-middle">
            <div class="container mt-90">
                <div class="text-center">
                    <h1 class="text-orange" style="text-shadow: 1px 2px 3px #c03c00">Indonesia SIS</h1>
                </div>
            </div>

        </div>
        <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;"><div style="background-position: 50% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(&quot;file:///Users/britech/Downloads/Telegram%20Desktop/main-files/Template/images/bg/02.jpg&quot;); position: fixed; top: 0px; left: 0px; width: 1280px; height: 466.6px; overflow: hidden; pointer-events: none; margin-top: 19.2px; transform: translate3d(0px, -147px, 0px);"></div></div>
    </section>

    <section class="our-history white-bg page-section-ptb" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-justify">
                        {{--<h2 class="title-effect">Indonesia SIS</h2>--}}
                        <p>Safeguards telah lama digunakan dalam pengelolaan hutan dan perdagangan hasil hutan dalam rangka melindunggi kelestarian sumberdaya hutan. Munculnya berbagai standar dan tuntutan adanya sertifikasi di bidang kehutanan menunjukkan semakin ketatnya safeguards dalam pengelolaan sumberdaya hutan. Karenanya bukanlah hal baru apabila ada tuntutan diterapkannya safeguards dalam implementasi REDD+. </p>
                        <p>COP-16 di Cancun mengamanatkan bahwa dalam aksi REDD+ setiap negara perlu mendorong diterapkannya 7 (tujuh) ‘safeguards’ sebagai berikut : </p>
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
                                    <p>Melengkapi atau konsisten dengan tujuan program kehutanan nasional, konvensi dan kesepakatan internasional terkait.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge"><p class="theme-color">02</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-body text-justify">
                                    <p>Struktur tata-kelola hutan nasional yang transparan dan efektif, mempertimbangkan peraturan-perundangan yang berlaku dan kedaulatan negara yang bersangkutan.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge"><p class="theme-color">03</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <p>Menghormati pengetahuan dan hak ‘Indigenous Peoples’ dan masyarakat lokal, dengan mempertimbangkan tanggung jawab, kondisi dan hukum nasional, dan mengingat bahwa Maejlis Umum PBB telah mengadopsi Deklarasi Hak ‘Indigenous Peoples’.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge"><p class="theme-color">04</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-body text-justify">
                                    <p>Partisipasistakeholders secara penuh dan efektif, khususnya ‘Indigenous Peoples’ dan masyarakat lokal.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge"><p class="theme-color">05</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-body text-justify">
                                    <p>Konsisten dengan konservasi hutan alam dan keanekaragaman hayati, menjamin bahwa aksi REDD+ tidak digunakan untuk mengkonversi hutan alam, tetapi sebaliknya untuk memberikan insentif terhadap perlindungan dan konservasi hutan alam dan jasa ekosistem, serta untuk meningkatkan manfaat sosial dan lingkungan lainnya.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge"><p class="theme-color">06</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-body text-justify">
                                    <p>Aksi untuk menangani resiko-balik (reversals).</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge"><p class="theme-color">07</p></div>
                            <div class="timeline-panel">
                                <div class="timeline-body">
                                    <p>Aksi untuk mengurangi pengalihan emisi.</p>
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
