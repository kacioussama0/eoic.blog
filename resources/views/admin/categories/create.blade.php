@extends('admin.layouts.app')
@section('title',__('forms.add-category'))



@section('content')

    <form action="{{route('categories.store')}}" method="POST">

            @csrf

        <x-admin.forms.input name="name" title="{{__('forms.category-in-ar')}}" type="text" value="{{old('name')}}"/>
        <x-admin.forms.input name="name_fr" title="{{__('forms.category-in-fr')}}" type="text" value="{{old('name_fr')}}"/>
        <x-admin.forms.input name="name_en" title="{{__('forms.category-in-en')}}" type="text" value="{{old('name_en')}}"/>





        <button class="btn btn-primary w-100">{{__('forms.add-category')}}</button>

    </form>



@endsection
