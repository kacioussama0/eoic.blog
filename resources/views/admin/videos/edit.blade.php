@extends('admin.layouts.app')
@section('title','تعديل فيديو')



@section('content')

    <form action="{{route('videos.update',$video)}}" method="POST">

        @csrf
        @method('PATCH')
        <x-admin.forms.input name="title" title="العنوان" type="text" value="{{$video -> title}}"/>
        <x-admin.forms.input name="url" title="الرابط" type="text" value="{{$video -> url}}"/>

        <div class="form-check form-switch mb-3">
            <label for="is_published">الفيديو منشور</label>
            <input class="form-check-input" @if($video -> is_published) checked @endif type="checkbox" name="is_published" id="is_published" value="1">
        </div>



        <button class="btn btn-primary w-100">تعديل الفيديو</button>

    </form>



@endsection
