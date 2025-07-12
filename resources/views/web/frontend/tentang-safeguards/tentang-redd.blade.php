@extends('web.frontend.layouts.app')

@section('content')

    <section class="page-title bg-overlay-white-50 parallax" data-jarallax="{&quot;speed&quot;: 0.6}" style="background-image: url({{ asset('image/banner-homepage.jpeg')}})">
        <div class="slider-content-middle">
            <div class="container mt-90">
                <div class="text-center">
                    <h1 class="text-orange" style="text-shadow: 1px 2px 3px #c03c00">Tentang Safeguards Indonesia</h1>
                </div>
            </div>

        </div>
        <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;"><div style="background-position: 50% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(&quot;file:///Users/britech/Downloads/Telegram%20Desktop/main-files/Template/images/bg/02.jpg&quot;); position: fixed; top: 0px; left: 0px; width: 1280px; height: 466.6px; overflow: hidden; pointer-events: none; margin-top: 19.2px; transform: translate3d(0px, -147px, 0px);"></div></div>
    </section>

    <section class="our-history white-bg page-section-ptb" >
        <div class="container"></div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-justify">
                        {{--<h2 class="title-effect">Indonesia SIS</h2>--}}
                        <p>Sistem informasi dalam SIS-REDD+ dimaksudkan sebagai kegiatan untuk menngumpulkan, mengolah, menganalisis dan menyajikan data dan informasi yang diperlukan tentang implementasi atau bagaimana ketujuh safeguards seperti tertuang dalam Annex 1 Paragraph 2 Keputusan No. 1 COP-16 ditangani dan dihormati.

                            Langkah awal pembangunan SIS-REDD+ dilakukan dengan mengidentifikasi instrumen-instrumen yang sudah ada dalam sistem Indonesia atau yang diterapkan di Indonesia dan melihat relevansinya dengan safeguards berdasarkan Keputusan COP-16. Dari hasil diskusi multistakeholder , diperoleh masukan bahwa sistem informasi ini akan terikat dengan standard dan aturan sistem informasi yang berlaku di Indonesia, dan merupakan bagian integral dari sistem informasi REDD+ di kemudian hari.

                            Sesuai dengan keputusan COP-17 terkait guidance untuk pembangunan SIS-REDD+, ringkasan (summary) informasi tentang implementasi ketujuh safeguards dalam Keputusan COP-16 disampaikan ke masyarakat internasional di UNFCCC melalui “National Communication” dan “channel/s” lain yang akan disepakati oleh COP. Hal ini berarti untuk sementara ini tata waktu penyampaian ringkasan informasi pelaksanaan safeguards mengikuti tata waktu penyampaian “National Communication”  dimana untuk negara berkembang setiap 4 (empat) tahun sekali.

                            Sesuai amanah COP-16 dan COP-17 saeguards perlu dilaksanakan pada semua tahapan implementasi REDD+. Dengan mempertimbangkan bahwa implementasi REDD+ adalah sukarela, disesuaikan dengan kondisi negara, kapasitas dan kapabilitas, menghormati kedaulatan negara yang bersangkutan, serta sesuai dengan dukungan yang diperoleh baik finansial, teknologi maupun pengembangan kapasitas, maka setiap negara dapat menentukan pilihan fase implementasi safeguards sejalan dengan fase implementasi REDD+, demikian juga dalam pembangunan SIS-REDD+.

                            Struktur kelembagaan dan alur informasi SIS-REDD+ sesuai dengan hasil proses multipihak serta memperhatikan perkembangan baik di nasional maupun internasional, adalah sebagaimana Bagan 1 dan 2.</p>
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
