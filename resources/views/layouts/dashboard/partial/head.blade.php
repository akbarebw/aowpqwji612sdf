 <!-- Meta -->
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="author" content="dexignlabs">
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <meta name="robots" content="index, follow">
 {{-- <meta name="keywords" content="admin, dashboard, admin dashboard, admin template, template, admin panel, administration, analytics, bootstrap, modern, responsive, creative, retina ready, modern Dashboard responsive dashboard, responsive template, user experience, user interface, Bootstrap Dashboard, Analytics Dashboard, Customizable Admin Panel, EduMin template, ui kit, web app, EduMin, School Management,Dashboard Template, academy, course, courses, e-learning, education, learning, learning management system, lms, school, student, teacher"> --}}
 <meta name="description" content="@yield('page_description', $page_description ?? '')">
 <meta property="og:title" content="@yield('page_description', $page_description ?? '')">
 {{-- <meta property="og:image" content="https://edumin.dexignlab.com/laravel/social-image.png"> --}}
 <meta name="format-detection" content="telephone=no">
 {{-- <meta name="twitter:title" content="@yield('page_description', $page_description ?? '')"> --}}
 <meta name="viewport" content="width=device-width, initial-scale=1">
 {{-- <meta name="twitter:image" content="https://edumin.dexignlab.com/laravel/social-image.png"> --}}
 {{-- <meta name="twitter:card" content="summary_large_image"> --}}

 <link rel="shortcut icon" type="image/png" href="{{ asset('asset_dashboard/images/logo-politani.png') }}">
 <title>Sia Politani Samarinda | @yield('title')</title>

 <link href="{{ asset('asset_dashboard/vendor/pickadate/themes/default.css') }}" rel="stylesheet" type="text/css">
 <link href="{{ asset('asset_dashboard/vendor/pickadate/themes/default.date.css') }}" rel="stylesheet" type="text/css">
 <link href="{{ asset('asset_dashboard/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">

 <link href="{{ asset('asset_dashboard/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">


 <link href="{{ asset('asset_dashboard/vendor/bootstrap-select/dist/css/bootstrap-select.min.css ') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('asset_dashboard/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link href="{{ asset('asset_dashboard/vendor/select2/css/select2.min.css') }}" rel="stylesheet">
 <link href="{{ asset('asset_dashboard/css/style.css') }}" rel="stylesheet">


 @stack('css')