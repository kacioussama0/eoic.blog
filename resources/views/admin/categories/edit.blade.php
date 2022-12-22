@extends('admin.layouts.app')
@section('title',__('forms.edit-category'))



@section('content')

    <form action="{{route('categories.update',$category)}}" method="POST">

            @csrf
            @method('PATCH')
        <x-admin.forms.input name="name" title="{{__('forms.category-in-ar')}}" type="text" value="{{$category -> name}}"/>
        <x-admin.forms.input name="name_fr" title="{{__('forms.category-in-fr')}}" type="text" value="{{$category -> name_fr}}"/>
        <x-admin.forms.input name="name_en" title="{{__('forms.category-in-en')}}" type="text" value="{{$category -> name_en}}"/>





        <button class="btn btn-primary w-100">{{__('forms.edit-category')}}</button>

    </form>



@endsection
