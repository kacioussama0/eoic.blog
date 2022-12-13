@extends('admin.layouts.app')
@section('title','إضافة تصنيف')



@section('content')

    <form action="{{route('categories.store')}}" method="POST">

            @csrf

        <x-admin.forms.input name="name" title="التصنيف بالعربية" type="text" value="{{old('name')}}"/>
        <x-admin.forms.input name="name_fr" title="التصنيف بالفرنسية" type="text" value="{{old('name_fr')}}"/>
        <x-admin.forms.input name="name_en" title="التصنيف بالإنجليزية" type="text" value="{{old('name_en')}}"/>





        <button class="btn btn-primary w-100">إضافة تصنيف</button>

    </form>



@endsection
