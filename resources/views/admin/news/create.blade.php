@extends('admin.layouts.app')
@section('title','إضافة خبر')



@section('content')

    <form action="{{route('news.store')}}" method="POST">

            @csrf

        <x-admin.forms.input name="title" title="العنوان" type="title" value="{{old('title')}}"/>

        <div class="form-check form-switch mb-3">
            <label for="is_published">الخبر منشور</label>
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1">
        </div>



        <button class="btn btn-primary w-100">إضافة الخبر</button>

    </form>



@endsection
