@extends('admin.layouts.app')
@section('title','تعديل تصنيف')



@section('content')

    <form action="{{route('categories.update',$category)}}" method="POST">

            @csrf
            @method('PATCH')
        <x-admin.forms.input name="name" title="التصنيف بالعربية" type="text" value="{{$category -> name}}"/>
        <x-admin.forms.input name="name_fr" title="التصنيف بالفرنسية" type="text" value="{{$category -> name_fr}}"/>
        <x-admin.forms.input name="name_en" title="التصنيف بالإنجليزية" type="text" value="{{$category -> name_en}}"/>





        <button class="btn btn-primary w-100">تعديل تصنيف</button>

    </form>



@endsection
