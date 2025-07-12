@extends('web.frontend.layouts.app')

@section('content')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row justify-content-center mt-30">
                <div class="col-md-10">
                    <div class="section-title text-center">
                        <h2 class=""><b>Hubungi Kami</b></h2>
                        <p class="mb-50">Senang sekali mendengar pendapat Anda! Jika Anda memiliki pertanyaan, jangan ragu untuk mengirimkan pesan kepada kami. Kami menantikan kabar dari Anda! Kami membalas di dalam<span class="tooltip-content theme-color" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Mon-Fri 10am–7pm (GMT +1)"> 24 hours!</span></p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="formmessage">Success/Error Message Goes Here</div>
                    <form id="contactform" role="form" method="post" action="php/contact-form.php">
                        <div class="contact-form clearfix">
                            <div class="section-field">
                                <input id="name" type="text" placeholder="Name*" class="form-control" name="name">
                            </div>
                            <div class="section-field">
                                <input type="email" placeholder="Email*" class="form-control" name="email">
                            </div>
                            <div class="section-field">
                                <input type="text" placeholder="Phone*" class="form-control" name="phone">
                            </div>
                            <div class="section-field textarea">
                                <textarea class="input-message form-control" placeholder="Comment*" rows="7" name="message"></textarea>
                            </div>
                            <!-- Google reCaptch-->
                            <!-- <div class="g-recaptcha section-field clearfix" data-sitekey="6LfNmS0UAAAAAO_ZVFQoQmkGPMlQXmKgVbizHFoq"></div> -->
                            <div class="submit-button text-center">
                                <input type="hidden" name="action" value="sendEmail">
                                <button id="submit" name="submit" type="submit" value="Send" class="button"><span> Send message </span> <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
{{--                    <div id="ajaxloader" style="display:none"><img class="mx-auto mt-30 mb-30 d-block" src="images/pre-loader/loader-02.svg" alt=""></div>--}}
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-12">
                    <div class="office-1 black-bg parallax full-width mb-5 sm-mb-20 bg-overlay-black-60 parallax" style="background: url({{asset('image/banner-1.jpg')}});">
                        <div class="touch-in position-relative">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="d-flex h-100 p-4">
                                        <div class="feature-icon media-icon mr-4">
                                            <span class="ti-map-alt theme-color fa-3x"></span>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="text-white">ADDRESS</h5>
                                            <p class="mb-0 text-white">17504 Carlton Cuevas Rd, Gulfport, MS, 39503</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="d-flex h-100 p-4">
                                        <div class="feature-icon media-icon mr-4">
                                            <span class="ti-mobile theme-color fa-3x"></span>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="text-white">PHONE</h5>
                                            <p class="mb-0 text-white">+(704) 279-1249</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="d-flex h-100 p-4">
                                        <div class="feature-icon media-icon mr-4">
                                            <span class="ti-email theme-color fa-3x"></span>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="text-white">EMAIL</h5>
                                            <p class="mb-0 text-white">letstalk@webster.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-30">
                <div class="col-lg-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2371945464124!2d106.87458047540196!3d-6.23243089375572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3b006392395%3A0x5f8011edf9336c86!2sKantor%20KLHK!5e0!3m2!1sid!2sid!4v1718337563970!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>


@endsection
