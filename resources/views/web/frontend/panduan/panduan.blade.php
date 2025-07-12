@extends('web.frontend.layouts.app')
@section('content')
    <section class="faq white-bg page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        {{--                        <h6>@lang('faq.punya_pertanyaan')</h6>--}}
                        <h1 class="">@lang('panduan.panduan')</h1>
                        <p>@lang('panduan.desc1')</p>
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
                <div class="col-lg-12">
                    @if($panduans->isEmpty())
                        <p class="text-center">@lang('panduan.no_data') "{{ isset($_GET['search'])?$_GET['search']:'' }}" </p>
                        <h4 class="text-center">@lang('panduan.tidak_ada_data')</h4>
                    @else
                    <div class="accordion gray plus-icon round mb-30">
                        @foreach($panduans as $item)
                            <div class="acd-group acd-active">
                                <a href="#" class="acd-heading mb-0-1">{{  Config::get('app.locale') == 'en' ? $item->name_en : $item->name_id }}</a>
                                <div class="acd-des p-0" style="">
                                    <div class="card-content">
                                        <div class="card-body rounded-0-5 p-0">
                                            <iframe id="surat" width="100%" style="height: 90vh;" src="{{ asset($item->getFirstMediaUrl()) }}#zoom=63" class="border-0 rounded"></iframe>
                                            <p class="mt-2">{!! Config::get('app.locale') == 'en' ? $item->description_en : $item->description_id !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>


@endsection
