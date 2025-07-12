<header id="header" class="header light fullWidth ">
    <div class="container">
        {{--            <div class="row">--}}
        {{--                <div class="col-lg-6 col-md-6 xs-mb-10">--}}
        {{--                    <div class="topbar-call text-center text-md-left">--}}
        {{--                        <ul>--}}
        {{--                            <li><i class="fa fa-envelope-o theme-color"></i> gethelp@webster.com</li>--}}
        {{--                            <li><i class="fa fa-phone"></i> <a href="tel:+7042791249"> <span>+(704) 279-1249 </span> </a> </li>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-lg-6 col-md-6">--}}
        {{--                    <div class="topbar-social text-center text-md-right">--}}
        {{--                        <ul>--}}
        {{--                            <li><a href="#"><span class="ti-facebook"></span></a></li>--}}
        {{--                            <li><a href="#"><span class="ti-instagram"></span></a></li>--}}
        {{--                            <li><a href="#"><span class="ti-google"></span></a></li>--}}
        {{--                            <li><a href="#"><span class="ti-twitter"></span></a></li>--}}
        {{--                            <li><a href="#"><span class="ti-linkedin"></span></a></li>--}}
        {{--                            <li><a href="#"><span class="ti-dribbble"></span></a></li>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
    </div>

    <div class="menu">
      <!-- menu start -->
        <nav id="menu" class="mega-menu">
            <section class="menu-list-items">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <ul class="menu-logo">
                                <li>
                                    <a href="/"><img id="logo_img" src="{{asset('image/logo_dark.webp')}}" alt="logo"> </a>
                                </li>
                            </ul>
                            <div class="menu-bar">
                                <ul class="menu-links">
                                    @foreach($menu as $item)
                                        @if($item->route_with_slug)
                                            <li class="{{ request()->route()->named($item->external_url ? $item->external_url : ($item->custom_url ? $item->custom_url.'*': 'pageCategory.detail')) ? 'active' : '' }}" >
                                                <a {!! $item->external_url? 'target="_blank" ':'' !!} href="{{ $item->external_url?: ($item->custom_url ? $item->route_with_slug ? route($item->custom_url,[$item->slug]) : route($item->custom_url) : route('pageCategory.detail',[$item->slug])) }}">
                                                    {{ Config::get('app.locale')=='en'?$item->name_en :$item->name }}
                                                </a>
                                            </li>
                                        @elseif(!$item->pages->isEmpty())
                                            <li class="{{ request()->route()->named('page.detail') ? 'active' : '' }}"><a href="javascript:void(0)"> {{ Config::get('app.locale')=='en'?$item->name_en :$item->name }} <i class="fa fa-angle-down fa-indicator"></i></a>
                                                <!-- drop down multilevel  -->
                                                <ul class="drop-down-multilevel">
                                                    @foreach($item->pages as $items)
                                                        @if(!$items->children->isEmpty())
                                                            <li><a href="javascript:void(0)">{!! $items->judul !!} <i class="ti-plus fa-indicator"></i></a>
                                                                <ul class="drop-down-multilevel ">
                                                                    @foreach($items->children as $child)
                                                                        <li><a href="{{ $child->external_url?: ($child->custom_url ? route($child->custom_url) : route('page.detail',[$child->slug])) }}">{{ Config::get('app.locale')=='en'?$child->judul_en :$child->judul_id }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @else
                                                            <li class="{{ request()->route()->named('page.detail') ? 'active' : '' }}"><a href="{{ $items->external_url?: ($items->custom_url ? route($items->custom_url) : route('page.detail',[$items->slug])) }}">{{ Config::get('app.locale')=='en'?$items->judul_en :$items->judul_id  }}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li class="{{ request()->route()->named($item->external_url ? $item->external_url : ($item->custom_url ? $item->custom_url.'*': 'pageCategory.detail')) ? 'active' : '' }}" >
                                                <a {!! $item->external_url ? 'target="_blank" ':'' !!} href="{{ $item->external_url?: ($item->custom_url ? $item->route_with_slug ? route($item->custom_url,[$item->slug]) : route($item->custom_url) : route('pageCategory.detail',[$item->slug])) }}">
                                                    {{ Config::get('app.locale')=='en'?$item->name_en :$item->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <div class="search-cart">
                                    <div class="shpping-cart justify-content-center">
                                        @auth
                                        <a href="{{ route('home') }}" class="pr-15 pl-15">
                                            <span class="btn btn-primary align-self-center icon rounded-2">@lang('beranda.masuk_dashboard')</span>
                                        </a>
                                        @else
                                            <a href="{{ route('login') }}" class="pr-15 pl-15">
                                                <span class="btn btn-primary align-self-center icon rounded-2">@lang('login.masuk') / @lang('login.daftar')</span>
                                            </a>
                                        @endif
                                        <a class="cart-btn pr-0 pl-0" href="javascript: void(0);"><i class="flag-icon @if(Config::get('app.locale')=='id') flag-icon-id @elseif (Config::get('app.locale')=='en') flag-icon-gb @endif box-shadow-1"></i><span class="selected-language"></span> <i class="ft-chevron-down text-black"></i>
{{--                                            {{LaravelLocalization::getCurrentLocaleNative()}}--}}
                                        </a>
                                        <div class="cart shadow" style="width: min-content !important;">
                                            <div class="cart-item p-2 border-0">
                                                <div class="cart-name p-0 m-0">
                                                    <a class="dropdown-item mb-10 @if(Config::get('app.locale')=='id') active-dark @endif" href="{!! LaravelLocalization::getLocalizedURL('id')  !!}"><i class="flag-icon flag-icon-id box-shadow-0-1"></i> Indonesia</a>
                                                    <a class="dropdown-item @if(Config::get('app.locale')=='en') active-dark @endif" href="{!! LaravelLocalization::getLocalizedURL('en') !!}"><i class="flag-icon flag-icon-gb box-shadow-1"></i> English</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </nav>
    </div>
</header>
