


<!DOCTYPE html>
<html lang="en">
<head>
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

 <link href="{{ asset('asset_dashboard/css/style.css') }}" rel="stylesheet">
 <link href="{{ asset('asset_dashboard/vendor/pickadate/themes/default.css') }}" rel="stylesheet">
 <link href="{{ asset('asset_dashboard/vendor/pickadate/themes/default.date.css') }}" rel="stylesheet">
 <link href="{{ asset('asset_dashboard/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">


</head>
<body>
<div class="fix-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="card mb-0 h-auto">
                        <div class="card-body">
                            <div class="text-center mb-2">
                                <a href="{{ url('index') }}">
                                    <img src="/asset_dashboard/images/logo-politani-black.png" alt="Logo Politani" width="250" height="56">
                                </a>
                            </div>
                            <h4 class="text-center mb-4">Sign in your account</h4>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="username">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="email" id="email" >
                                </div>
                                <div class="mb-4 position-relative">
                                    <label class="form-label" for="dlabPassword">Password</label>
                                    <input type="password" id="dlabPassword" class="form-control" value="" name="password">
                                    <span class="show-pass eye">
                                        <i class="fa fa-eye-slash"></i>
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                                <div class="form-row d-flex flex-wrap justify-content-between mt-4 mb-2">
                                    <div class="form-group">
                                        <div class="form-check custom-checkbox ms-1">
                                            <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                            <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                                        </div>
                                    </div>
                                    <div class="form-group ms-2">
                                        <a class="btn-link" href="{{ url('page-forgot-password') }}">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                </div>
                            </form>

                            <div class="col-md-12 mt-5">
                                <div class="row">
                                    <div class="col-md-7">
                                        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>

                                    </div>
                                    <div class="col-md-5 text-center">
                                        <a href="{{ route('login.keycloak') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 btn btn-light btn-sm">
                                        <i class="fa fa-sign-in"></i> Login with SSO
                                    </a>


                                    </div>

                                </div>
                            </div>
                            <div class="new-account mt-3">
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
    </div>
    <script src="{{ asset('asset_dashboard/vendor/global/global.min.js') }}"></script>
    {{-- <script src="{{ asset('asset_dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script> --}}
    <script src="{{ asset('asset_dashboard/vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('asset_dashboard/vendor/svganimation/svg.animation.js') }}"></script>
    <script src="{{ asset('asset_dashboard/js/custom.min.js') }}"></script>
    <script src="{{ asset('asset_dashboard/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('asset_dashboard/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('asset_dashboard/vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('asset_dashboard/js/plugins-init/sparkline-init.js') }}"></script>
    <script src="{{ asset('asset_dashboard/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('asset_dashboard/vendor/morris/morris.min.js') }}"></script>
    <script src="{{ asset('asset_dashboard/js/plugins-init/widgets-script-init.js') }}"></script>
    <script src="{{ asset('asset_dashboard/js/dashboard/dashboard.js') }}"></script>
    <script src="{{ asset('asset_dashboard/js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('asset_dashboard/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

</body>
</html>
