@extends('admin.layouts.app')
@section('title','إضافة وسم')



@section('content')

    <form action="{{route('tags.store')}}" method="POST">

            @csrf

        <x-admin.forms.input name="name" title="الوسم بالعربية" type="text" value="{{old('name')}}"/>
        <x-admin.forms.input name="name_fr" title="الوسم بالفرنسية" type="text" value="{{old('name_fr')}}"/>
        <x-admin.forms.input name="name_en" title="الوسم بالإنجليزية" type="text" value="{{old('name_en')}}"/>





        <button class="btn btn-primary w-100">إضافة وسم</button>

    </form>



@endsection
