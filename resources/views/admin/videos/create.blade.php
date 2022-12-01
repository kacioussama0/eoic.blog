@extends('admin.layouts.app')
@section('title','إضافة فيديو')



@section('content')

    <form action="{{route('videos.store')}}" method="POST">

            @csrf

        <x-admin.forms.input name="title" title="العنوان" type="text" value="{{old('title')}}"/>
        <x-admin.forms.input name="url" title="الرابط" type="text" value="{{old('url')}}"/>

        <div class="form-check form-switch mb-3">
            <label for="is_published">الفيديو منشور</label>
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1">
        </div>



        <button class="btn btn-primary w-100">إضافة الفيديو</button>

    </form>



@endsection
