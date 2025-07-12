
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webster - Responsive Multi-purpose HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Daftar || SISREDD</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- font -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    @include('web.frontend.layouts.css')

</head>

<body>

<div class="wrapper">

    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="{{asset('master/asset-web/images/pre-loader/loader-01.svg')}}" alt="">
    </div>

    <!--=================================
     preloader -->

    <!--=================================
     Signup-->

    <section class="login-box-main height-100vh page-section-ptb" style="background: url({{asset('image/banner-homepage.jpeg')}});">
        <div class="login-box-main-middle">
            <div class="container">
                <div class="row justify-content-center no-gutter">
                    <div class="col-lg-2 col-md-4">
                        <div class="login-box-left  white-bg">
                            <img class="logo-small w-75" src="{{asset('image/logo_dark.webp')}}"  alt="">
                            <ul class="nav">
                                <li><a href="{{route('login')}}"> <i class="ti-user"></i> Masuk</a></li>
                                <li class="active"><a href="#"> <i class="ti-pencil-alt"></i> Daftar</a></li>
                            </ul>
                            {{--<div class="social-icons color-hover clearfix pos-bot pb-30 pl-30">
                                <ul>
                                    <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="social-instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>--}}
                        </div>
                    </div>
                    <div class="col-md-4 theme-bg">
                        <div class="login-box pos-r text-white login-box-theme">
                            <h2 class="text-white mb-20">Selamat Datang</h2>
                            <p class="mb-10 text-white">Sistem Informasi Safeguards REDD+ Indonesia</p>
                            <p class="text-white">Sistem Informasi Safeguards (SIS) REDD+ merupakan sistem penyedia informasi pelaksanaan safeguards REDD+ berbasis web dalam rangka mendukung implementasi REDD+ secara penuh di Indonesia</p>
                            {{--<ul class="list-unstyled pos-bot pb-40">
                                <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                                <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                            </ul>--}}
                        </div>
                    </div>
                        <div class="col-md-4">
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="login-box pb-50 clearfix white-bg">
                                    <h3 class="mb-30">Daftar</h3>
                                    <div class="section-field mb-20">
                                        <input type="text" placeholder="Username*" class="form-control" value="{{ old('username') }}" name="username">
                                    </div>
                                            @error('username')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                    <div class="section-field mb-20">
                                        <input type="text" placeholder="Nama Lengkap*" value="{{ old('name') }}" class="form-control" name="name">
                                    </div>
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                    <div class="section-field mb-20">
                                        <input type="email" placeholder="Email*" value="{{ old('email') }}" class="form-control" name="email">
                                    </div>
                                    <div class="section-field mb-20">
                                        <input id="Password" class="Password form-control" type="password" placeholder="Password" name="password">
                                    </div>
                                            @error('password')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                    <div class="section-field mb-20">
                                        <input id="password_confirmation" class="Password form-control" type="password" placeholder="Konfirmasi Password" name="password_confirmation">
                                    </div>

                                    <div class="captcha">
                                        <span>{!! captcha_img('flat') !!}</span>
                                        <button type="button" class="btn btn-danger reload fs-1" id="reload">
                                            &#x21bb;
                                        </button>
                                        <input type="text" class="form-control input-style-2 mt-1 mb-3 @error('captcha') is-invalid @enderror" autocomplete="off" name="captcha" placeholder="Masukkan Kode Captcha" id="">
                                    </div>
                                    <button type="submit" class="button">
                                        <span>Signup</span>
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
     signup-->


</div>



<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div>

@include('web.frontend.layouts.js')




</body>
</html>
