@extends('admin.layouts.app')
@section('title','إضافة مجلة')



@section('content')


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
        <form action="{{route('magazines.store')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade  show active" id="ar-tab" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                    <x-admin.forms.input name="title" title="العنوان" type="text" value="{{old('title')}}"/>
                    <x-admin.forms.input name="thumbnail" title="الصورة" type="file" value="{{old('thumbnail')}}"/>
                    <x-admin.forms.input name="book" title="الكتاب" type="file" value="{{old('book')}}"/>

                    <div class="form-check form-switch mb-3">
                        <label for="is_published">المجلة منشورة</label>
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1">
                    </div>

                </div>
                <div class="tab-pane fade" id="en-tab" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

                    <x-admin.forms.input name="title_en" title="العنوان" type="text" value="{{old('title_en')}}"/>
                    <x-admin.forms.input name="thumbnail_en" title="الصورة" type="file" value="{{old('thumbnail_en')}}"/>
                    <x-admin.forms.input name="book_en" title="الكتاب" type="file" value="{{old('book_en')}}"/>
                </div>
                <div class="tab-pane fade" id="fr-tab" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                    <x-admin.forms.input name="title_fr" title="العنوان" type="text" value="{{old('title_fr')}}"/>
                    <x-admin.forms.input name="thumbnail_fr" title="الصورة" type="file" value="{{old('thumbnail_fr')}}"/>
                    <x-admin.forms.input name="book_fr" title="الكتاب" type="file" value="{{old('book_fr')}}"/>
                </div>

            </div>
            <button class="btn btn-primary w-100">إضافة مجلة</button>

        </div>

    </div>





    </form>

@endsection
