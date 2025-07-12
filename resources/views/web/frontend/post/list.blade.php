@extends('web.frontend.layouts.app')
@section('content')
    <section class="faq white-bg page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        {{--                        <h6>@lang('faq.punya_pertanyaan')</h6>--}}
                        <h1 class="">@lang('berita.semua_berita')</h1>
                        <p>@lang('berita.desc1') </p>
                    </div>
                    <div class="section-content mb-5">
                        <div class="widget-search">
                            <form action="">
                                <i class="fa fa-search"></i>
                                <input name="search" value="{{ isset($_GET['search'])?$_GET['search']:'' }}" type="search" class="form-control" placeholder="Search....">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach($listPost as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-15">
                        <div class="feature-box text-white active">
                            <div class="feature-box-content mb-3">
                                <h4 class="font-weight-800 text-white pt-0 desc-p l-height-34">{{ Config::get('app.locale') == 'en' ? $item->judul_en :$item->judul_id  }}</h4>
                                <p class="desc-p-3 text-white font-medium-1 mt-20 l-height-30">
                                    {!! Config::get('app.locale') == 'en' ? strip_tags($item->content_en,'/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si') :strip_tags($item->content_id,'/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si') !!}
                                </p>
                                <span class="text-bold-700 text-white"><i class="fa fa-calendar-o font-medium-1 pl-0 text-orange"></i> {{ \Carbon\Carbon::now()->format('d F Y') }}</span>
                            </div>
                            <div class="divider"></div>
                            <a href="{{ route('post.detail',[$item->slug]) }}" class="mb-4 mt-4 text-center text-green text-bold-700" href="#">@lang('beranda.selengkapnya') <i class="fa fa-long-arrow-right font-medium-1 text-bold-400"></i></a>
                            <div class="feature-box-img" style="background-image: url('{{$item->getFirstMediaUrl()}}');"></div>
                            <span class="feature-border"></span>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {!! $listPost->links() !!}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>


@endsection
