@extends('admin.layouts.app')
@section('title',__('forms.edit-magazine'))



@section('content')
    <link href="{{asset('assets/dflip/assets/css/dflip.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dflip/assets/css/themify-icons.min.css')}}" rel="stylesheet" type="text/css">
    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#ar-tab" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><span class="fi fi-sa"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#en-tab" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><span class="fi fi-gb"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#fr-tab" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><span class="fi fi-fr"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                </li>
            </ul>
            <form action="{{route('magazines.update',$magazine)}}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PATCH')
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade  show active" id="ar-tab" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                        <x-admin.forms.input name="title" title="{{__('forms.title')}}" type="text" value="{{$magazine->title}}"/>
                        <x-admin.forms.input name="thumbnail" title="{{__('forms.picture')}}" type="file" value="{{old('thumbnail')}}"/>
                        <img src="{{asset('storage/' . $magazine->thumbnail)}}" alt="" width="200px" class="rounded mb-3">

                        <x-admin.forms.input name="book" title="{{__('forms.book')}}" type="file" value="{{old('book')}}"/>

                        <div class="_df_thumb"  source="{{asset('storage/' . $magazine -> book)}}" thumb="{{asset('storage/' . $magazine -> thumbnail)}}">
                            <div class="_df_book-cover _df_thumb-not-found"><span class="_df_book-title">{{$magazine->title}}</span></div>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <label for="is_published">{{__('forms.share')}}</label>
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" @if($magazine->is_published) checked @endif>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="en-tab" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

                        <x-admin.forms.input name="title_en" title="العنوان" type="text" value="{{$magazine -> title_en}}"/>
                        <x-admin.forms.input name="thumbnail_en" title="الصورة" type="file" value="{{$magazine -> thumbnail_en}}"/>
                        <img src="{{asset('storage/' . $magazine->thumbnail_en)}}" alt="" width="200px" class="rounded mb-3">

                        <x-admin.forms.input name="book_en" title="الكتاب" type="file" value="{{$magazine -> book_en}}"/>

                        <div class="_df_thumb"  source="{{asset('storage/' . $magazine -> book_en)}}" thumb="{{asset('storage/' . $magazine -> thumbnail_en)}}">
                            <div class="_df_book-cover _df_thumb-not-found"><span class="_df_book-title">{{$magazine->title_en}}</span></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fr-tab" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                        <x-admin.forms.input name="title_fr" title="العنوان" type="text" value="{{$magazine -> title_fr}}"/>
                        <x-admin.forms.input name="thumbnail_fr" title="الصورة" type="file" value="{{$magazine -> thumbnail_fr}}"/>
                        <img src="{{asset('storage/' . $magazine->thumbnail_fr)}}" alt="" width="200px" class="rounded mb-3">

                        <x-admin.forms.input name="book_fr" title="الكتاب" type="file" value="{{old('book_fr')}}"/>

                        <div class="_df_thumb"  source="{{asset('storage/' . $magazine -> book_fr)}}" thumb="{{asset('storage/' . $magazine -> thumbnail_fr)}}">
                            <div class="_df_book-cover _df_thumb-not-found"><span class="_df_book-title">{{$magazine->title_fr}}</span></div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-primary w-100">{{__('forms.edit-magazine')}}</button>

        </div>

    </div>





    </form>

    <script src="{{asset('assets/dflip/assets/js/dflip.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

@endsection





