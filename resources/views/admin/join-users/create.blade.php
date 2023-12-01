@extends('admin.layouts.app')
@section('title',__('forms.add-members'))



@section('content')
    <form action="{{route('organization-members.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-admin.forms.input name="name" title="{{__('forms.full-name')}}" type="text" value="{{old('name')}}"/>
        <x-admin.forms.input name="name_latin" title="{{__('forms.latin-name')}}" type="text" value="{{old('name_latin')}}"/>
        <x-admin.forms.input name="avatar" title="{{__('forms.picture')}}" type="file" value="{{old('avatar')}}"/>
        <x-admin.forms.input name="occupation" title="{{__('forms.profession')}}" type="text" value="{{old('occupation')}}"/>
        <x-admin.forms.input name="occupation_en" title="{{__('forms.profession-in-en')}}" type="text" value="{{old('occupation_en')}}"/>
        <x-admin.forms.input name="occupation_fr" title="{{__('forms.profession-in-fr')}}" type="text" value="{{old('occupation_fr')}}"/>
        <x-admin.forms.input name="order" title="{{__('forms.order')}}" type="number" value="{{old('order')}}"/>
        <button class="btn btn-primary w-100">{{__('forms.add-members')}}</button>
    </form>
@endsection
