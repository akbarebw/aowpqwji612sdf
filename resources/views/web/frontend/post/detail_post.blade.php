@extends('web.frontend.layouts.app')
@section('content')
    <style>
        p {
            color: black;
            font-weight: 500;
        }
    </style>
    <section class="blog blog-single white-bg pt-40 pb-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="blog-entry mb-10">
                        <div class="section-title text-left mb-20">
                            <h1 class="title text-black text-bold-700 mb-30">
                                {!! Config::get('app.locale')=='en' ? $postDetail->judul_en:$postDetail->judul_id !!}
                            </h1>
                            <div class="row">
                                <div class="col-4">
                                <h4 class="subtitle">{{ \Carbon\Carbon::parse($postDetail->created_at)->isoFormat('D MMMM Y') }} </h4>
                                </div>

                                <div class="col-8 text-right">
                                    <div class="entry-meta">
                                        <ul>

                                            <li class="mr-0"> <i class="fa fa-folder-open-o"></i> <a href="#"> {{ $postDetail['postCategory']['name'] }} </a> </li>
                                            <li class="mr-0"><a href="#"><i class="fa fa-eye"></i> {!! views($postDetail)->count(); !!}</a></li>
                                            <!--                                            <li class="mr-0"><span><i class="fa fa-comment-o"></i> 0</span></li>-->
                                        </ul>
                                    </div>
                                    <div class="social-icons color-icon social-border mt-1">
                                    </div>
                                </div>
                            </div>
                            <div class="divider dashed"></div>
                        </div>
                        <div class="entry-image clearfix">
                            <div class="owl-carousel bottom-right-dots" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
                                @foreach($postDetail->getMedia() as $image)
                                    <div class="item">
                                        <img class="img-fluid mb-15 rounded" src="{!! asset($image->getUrl('cover'))  !!}" alt="" style="height: 600px;width: 100%;object-fit: cover">
                                    </div>
                                @endforeach
                            </div>
                            <div class="font-italic">
                                {!! $postDetail->image_caption !!}
                            </div>
                        </div>
                        <div class="blog-detail">
                            <div class="entry-content" style="font-size: 1rem">
                                {!! Config::get('app.locale')=='en' ? $postDetail->content_en:$postDetail->content_id !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('css')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0&appId=298637494983635&autoLogAppEvents=1" nonce="hYx81EtD"></script>
@endsection
