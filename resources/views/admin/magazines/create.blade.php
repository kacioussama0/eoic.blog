@extends('admin.layouts.app')
@section('title','إضافة مجلة')



@section('content')

    <form action="{{route('magazines.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

        <x-admin.forms.input name="title" title="العنوان" type="text" value="{{old('title')}}"/>
        <x-admin.forms.input name="thumbnail" title="الصورة" type="file" value="{{old('thumbnail')}}"/>
        <x-admin.forms.input name="book" title="الكتاب" type="file" value="{{old('book')}}"/>

        <div class="form-check form-switch mb-3">
            <label for="is_published">المجلة منشورة</label>
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1">
        </div>

        <button class="btn btn-primary w-100">إضافة مجلة</button>

    </form>

@endsection
