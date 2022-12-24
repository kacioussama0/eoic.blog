@extends('admin.layouts.app')
@section('title',__('forms.edit-tag'))



@section('content')

    <form action="{{route('tags.update')}}" method="POST">

        @csrf
        @method('PATCH')
        <x-admin.forms.input name="name" title="{{__('forms.tag-in-ar')}}" type="text" value="{{$tag->name}}"/>
        <x-admin.forms.input name="name_fr" title="{{__('forms.tag-in-fr')}}" type="text" value="{{$tag->name_en}}"/>
        <x-admin.forms.input name="name_en" title="{{__('forms.tag-in-en')}}" type="text" value="{{$tag->name_fr}}"/>





        <button class="btn btn-primary w-100">{{__('forms.edit-tag')}}</button>

    </form>



@endsection
