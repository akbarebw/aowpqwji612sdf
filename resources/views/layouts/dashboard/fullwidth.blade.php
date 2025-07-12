@php
    $controller = DzHelper::controller();
    $page = $action = DzHelper::action();
    $action = $controller.'_'.$action;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('dz.name') }} | @yield('title', $page_title ?? '')</title> 

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="dexignlabs">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="admin, dashboard, admin dashboard, admin template, template, admin panel, administration, analytics, bootstrap, modern, responsive, creative, retina ready, modern Dashboard responsive dashboard, responsive template, user experience, user interface, Bootstrap Dashboard, Analytics Dashboard, Customizable Admin Panel, EduMin template, ui kit, web app, EduMin, School Management,Dashboard Template, academy, course, courses, e-learning, education, learning, learning management system, lms, school, student, teacher">   
	<meta name="description" content="@yield('page_description', $page_description ?? '')">
	<meta property="og:title" content="@yield('page_description', $page_description ?? '')">
	<meta property="og:image" content="https://edumin.dexignlab.com/laravel/social-image.png">
	<meta name="format-detection" content="telephone=no">
	<meta name="twitter:title" content="@yield('page_description', $page_description ?? '')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="twitter:image" content="https://edumin.dexignlab.com/laravel/social-image.png">
	<meta name="twitter:card" content="summary_large_image">
	<!-- Favicon icon -->
	<link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png') }}">
    <link class="main-css" href="css/style.css" rel="stylesheet">
    
</head>
       
<body>
    <div class="fix-wrapper">
        <div class="container">
            <div class="row justify-content-center">
				@yield('content')
			</div>
		</div>
    </div>
	
<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<!-- Required vendors -->
	@if(!empty(config('dz.public.global.js.top')))
        @foreach(config('dz.public.global.js.top') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
    @endif
    @if(!empty(config('dz.public.pagelevel.js.'.$action)))
        @foreach(config('dz.public.pagelevel.js.'.$action) as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
    @endif
    @if(!empty(config('dz.public.global.js.bottom')))
        @foreach(config('dz.public.global.js.bottom') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
    @endif
	
	@stack('scripts')
</body>
</html>