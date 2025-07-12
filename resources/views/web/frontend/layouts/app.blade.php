<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="sis redd+" />
<meta name="description" content="sis redd+" />
<meta name="author" content="britech.id" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>SIS REDD+</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('sisred.webp') }}" />

<!-- font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
{{--<link href="{{asset('master/app-assets/css/font.css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700')}}" rel="stylesheet">--}}

@include('web.frontend.layouts.css')
    @livewireStyles
@yield('css')

</head>

<body>


<div class="wrapper">

    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="{{ asset('master/asset-web/images/pre-loader/loader-01.svg') }}" alt="">
    </div>

    <!--=================================
     preloader -->

     @include('web.frontend.layouts.header')

     @yield("content")

     @include("web.frontend.layouts.footer")
</div>
     @include("web.frontend.layouts.js")
    @livewireScripts
     @yield("scripts")

</body>
</html>
