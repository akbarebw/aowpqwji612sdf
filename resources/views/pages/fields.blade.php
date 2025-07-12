
<div class="form-group col-sm-12">
    {!! Form::label('foto', 'Foto :') !!}
    <div class="position-relative">
        @if(!isset($page))
            <x-media-library-attachment  multiple name="media" rules="mimes:png,jpeg"/>
        @else
            <x-media-library-collection :model="$page"  name="media" rules="mimes:png,jpeg"/>
        @endif
    </div>
</div>

<!-- Judul Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('judul_id', 'Judul (Bahasa Indonesia) :') !!}
    {!! Form::text('judul_id', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Judul En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('judul_en', 'Judul (Bahasa Inggris):') !!}
    {!! Form::text('judul_en', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Content Id Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content_id', 'Konten (Bahasa Indonesia):') !!}
    {!! Form::textarea('content_id', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Content En Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content_en', 'Konten (Bahasa Inggris):') !!}
    {!! Form::textarea('content_en', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Custom Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('custom_url', 'Custom Url:') !!}
    {!! Form::text('custom_url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Page Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('page_category_id', 'Page Category:') !!}
    {!! Form::select('page_category_id',$pageCategory, null, ['class' => 'form-control','placeholder'=>'pilih kategori', 'required']) !!}
</div>

<!-- External Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('external_url', 'External Url:') !!}
    {!! Form::text('external_url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Parent Page Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_page_id', 'Parent Page:') !!}
    {!! Form::select('parent_page_id',$parentPage, null, ['class' => 'form-control','placeholder'=>'pilih parent']) !!}
</div>


{!! Form::hidden('users_id', auth()->id()) !!}


@section('scripts')

    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
    <script  type="text/javascript">
        setTimeout(function(){
            CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
            CKEDITOR.replace( 'content_en');
            CKEDITOR.replace( 'content_id');

        },300);
    </script>


@endsection
