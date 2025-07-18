@@extends('layouts.app')
@@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                @@include('flash::message')
                <div class="clearfix"></div>
                <div class="card">
                    <div class="border-left-pink border-left-6 box-shadow-1 rounded">
                        <div class="card-content ">
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    <div class="col-10 media-body mb-2">
                                        <div class="content-header-left breadcrumb-new">
                                            <span class="content-header-title mb-0 d-inline-block font-medium-4"><b>{{ $config->modelNames->humanPlural }}</b></span>
                                            <div class="breadcrumbs-top d-inline-block">
                                                <div class="breadcrumb-wrapper">
                                                    @@include('layouts.breadcrumb')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 text-right">
                                        @@can('{!! $config->modelNames->camelPlural !!}.index')
                                        <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.create') }}" class="btn btn-sm btn-green">Tambah Data
                                        </a>
                                        @@endcan
                                    </div>
                                </div>
                                {!! $table !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@@endsection

