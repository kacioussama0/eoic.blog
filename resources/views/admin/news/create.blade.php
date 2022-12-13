@extends('admin.layouts.app')
@section('title','إضافة خبر')



@section('content')

    <form action="{{route('news.store')}}" method="POST">

            @csrf

        <x-admin.forms.input name="title" title="العنوان بالعربية" type="text" value="{{old('title')}}"/>
        <x-admin.forms.input name="title_en" title="العنوان بالإنجيلزية" type="text" value="{{old('title_en')}}"/>
        <x-admin.forms.input name="title_fr" title="العنوان بالفرنسية" type="text" value="{{old('title_fr')}}"/>

        <div class="form-check form-switch mb-3">
            <label for="is_published">الخبر منشور</label>
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1">
        </div>



        <button class="btn btn-primary w-100">إضافة الخبر</button>

    </form>



@endsection
