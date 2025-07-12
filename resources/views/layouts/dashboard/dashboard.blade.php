<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.dashboard.partial.head')
    @livewireStyles
</head>

<body>


    <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('dashboard.index') }}" class="brand-logo">
                <img class="img-fluid p-4" src="{{ asset('asset_dashboard/images/logo-politani-text.png') }}" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->
        @include('layouts.dashboard.partial.header')


        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts.dashboard.partial.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--****
		Wallet Sidebar
		****-->
        <!--**********************************
            Content body start
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->

        @stack('modal')
        <!--**********************************
			Footer start
		***********************************-->
        @include('layouts.dashboard.partial.footer')

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--***********************************-->


    <!--**********************************
		Modal
	***********************************-->
    <!--**********************************
        Scripts
    ***********************************-->

    @include('layouts.dashboard.partial.script')
    @livewireScripts
    @stack('scripts')

    @if(session('login_success'))
    @php
    $nama = str_replace(',', '', collect(explode(' ', Auth::user()->name))->take(2)->implode(' '));
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: "Selamat Datang,",
            html: `
                    <h2 style="margin-top: 0; font-weight: bold;">{{ $nama }}!</h2>
                    <div style="text-align: center; margin-top: 0">
                        <video width="100%" autoplay loop muted playsinline style="border-radius: 12px;">
                            <source src="{{ asset('asset_dashboard/animation/login-success.mp4') }}" type="video/mp4">
                            Browser tidak mendukung video.
                        </video>
                    </div>
                `,
            background: '#FCFCFC',
            showConfirmButton: false,
            timer: 5200,
            width: 500,
            padding: '1em',
            backdrop: `
                    rgba(0,0,0,0.6)
                    center center
                    no-repeat
                `,
            didOpen: () => {
                document.querySelectorAll('.swal2-select').forEach(el => el.remove());
            }
        });
    </script>
    @endif

</body>

</html>