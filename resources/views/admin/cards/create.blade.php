@extends('admin.layouts.app')
@section('title','إضافة بطاقة')



@section('content')

    <form action="{{route('cards.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <x-admin.forms.input name="image" title="البطاقة بالعربية" type="file" value="{{old('image')}}"/>
        <x-admin.forms.input name="image_fr" title="البطاقة بالفرنسية" type="file" value="{{old('image_fr')}}"/>
        <x-admin.forms.input name="image_en" title="البطاقة بالإنجليزية" type="file" value="{{old('image_en')}}"/>

        <div class="form-check form-switch mb-3">
            <label for="is_published">البطاقة منشور</label>
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1">
        </div>

        <button class="btn btn-primary w-100">إضافة بطاقة</button>

    </form>



@endsection
