@extends('admin.layouts.app')
@section('title','تعديل وسم')



@section('content')

    <form action="{{route('tags.store')}}" method="POST">

        @csrf

        <x-admin.forms.input name="name" title="الوسم بالعربية" type="text" value="{{$tag->name}}"/>
        <x-admin.forms.input name="name_fr" title="الوسم بالفرنسية" type="text" value="{{$tag->name_en}}"/>
        <x-admin.forms.input name="name_en" title="الوسم بالإنجليزية" type="text" value="{{$tag->name_fr}}"/>





        <button class="btn btn-primary w-100">تعديل الوسم</button>

    </form>



@endsection
