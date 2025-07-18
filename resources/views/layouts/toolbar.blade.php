<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light bg-white bg-darken-1 navbar-shadow navbar-brand-left">
    <div class="navbar-wrapper">
        <div class="navbar-header ">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{('/')}}">
                        <img alt="robust admin logo" src="{{asset('image/logo_dark.webp')}}"  height="45">
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                    <li class="dropdown nav-item mega-dropdown">
                        <a class="nav-link text-uppercase black text-bold-800 font-medium-2">
                            {{env('APP_NAME')}}
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-id box-shadow-1" style="margin-top: 2px"></i><span class="selected-language"></span></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-id box-shadow-1"></i> Indonesia</a>
                        </div>
                    </li>
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="avatar avatar-online">
                                @if(empty(Auth::user()->foto))
                                    <img src="{{ asset('image/blank_profile.png') }}" alt="avatar"><i></i>
                                @else
                                    <img src="{{ asset(Auth::user()->foto) }}" alt="avatar"><i></i>
                                @endif
                            </span>
                            <span class="user-name text-uppercase font-small-3 text-bold-600">{!! Auth::user()->username !!}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="{!! url('/logout') !!}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
