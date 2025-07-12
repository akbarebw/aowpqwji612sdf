@extends('web.frontend.layouts.app')

@section('content')
    <livewire:livewire-about :pageCategory="$pageCategory"/>
@endsection

@section('scripts')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0"
        nonce="NlKpG7xt"></script>


@endsection
