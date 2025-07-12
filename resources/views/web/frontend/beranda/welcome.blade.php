@extends('web.frontend.layouts.app')

@section('content')
    <section class="slider-parallax business-banner-05 bg-overlay-black-50 parallax" data-jarallax="{&quot;speed&quot;: 0.6}" style="background-image: url({{ asset('image/banner-homepage.jpeg') }});">
        <div class="slider-content-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-content">
                            <h1 class="text-white">Sistem Informasi Safeguards <span class="typer" data-delay="150" data-words="REDD+ Indonesia" data-colors="#84ba3f,#84ba3f,#84ba3f" style="color: rgb(132, 186, 63);"></span><span class="cursor" data-cursordisplay="_" data-owner="some-id" style="transition: all 0.1s ease 0s; opacity: 0;">_</span></h1>
                            <p class="text-white">Sistem Informasi Safeguards (SIS) <b>REDD+</b>  merupakan sistem penyedia informasi pelaksanaan safeguards <b>REDD+</b> berbasis web dalam rangka mendukung implementasi <b>REDD+</b> secara penuh di Indonesia</p>
                            <a class="button" href="#">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;"><div style="background-position: 50% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(&quot;file:///Users/britech/Downloads/Telegram%20Desktop/main-files/Template/images/bg/26.jpg&quot;); position: fixed; top: 0px; left: 0px; width: 1280px; height: 365.35px; overflow: hidden; pointer-events: none; margin-top: 6.825px; transform: translate3d(0px, -7.425px, 0px);"></div></div>
    </section>

    <section class="marketing-service page-section-ptb">
        <div class="container">
            <div class="row mt-40 no-gutters">
                <div class="col-lg-4 col-sm-6 sm-mb-30 feature-text">
                    <div class="counter counter-small text-center">
                        <span class="timer" data-to="4905" data-speed="1000">100</span>
                        <label class="mt-0"> <b> TOTAL PENDAFTARAN </b></label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 sm-mb-30 feature-text">
                    <div class="counter counter-small text-center">
                        <span class="timer" data-to="3750" data-speed="1000">100</span>
                        <label class="mt-0"> <b> TOTAL AKTIFITAS REDD+ </b></label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 xs-mb-30 feature-text">
                    <div class="counter counter-small text-center">
                        <span class="timer" data-to="4782" data-speed="1000">100</span>
                        <label class="mt-0"> <b> TOTAL AKTIFITAS SAFEGUARDS+</b></label>
                    </div>
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
