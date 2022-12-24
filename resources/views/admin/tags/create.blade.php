@extends('admin.layouts.app')
@section('title',__('forms.add-tag'))



@section('content')

    <form action="{{route('tags.store')}}" method="POST">

            @csrf

        <x-admin.forms.input name="name" title="{{__('forms.tag-in-ar')}}" type="text" value="{{old('name')}}"/>
        <x-admin.forms.input name="name_fr" title="{{__('forms.tag-in-fr')}}" type="text" value="{{old('name_fr')}}"/>
        <x-admin.forms.input name="name_en" title="{{__('forms.tag-in-en')}}" type="text" value="{{old('name_en')}}"/>





        <button class="btn btn-primary w-100">{{__('forms.add-tag')}}</button>

    </form>



@endsection
