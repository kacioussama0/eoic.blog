@extends('admin.layouts.app')
@section('title',__('forms.edit-membres'))



@section('content')
    <form action="{{route('organization-members.update',$user)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-admin.forms.input name="name" title="{{__('forms.full-name')}}" type="text" value="{{$user->name}}"/>
        <x-admin.forms.input name="name_latin" title="{{__('forms.latin-name')}}" type="text" value="{{$user->name_latin}}"/>
        <x-admin.forms.input name="age" title="{{__('forms.age')}}" type="number" value="{{$user->age}}"/>
        <x-admin.forms.input name="avatar" title="{{__('forms.picture')}}" type="file" value="{{old('avatar')}}"/>
        <img src="{{asset('storage/' . $user -> avatar)}}"  width="200" class="rounded"/>
        <x-admin.forms.input name="occupation" title="{{__('forms.profession')}}" type="text" value="{{$user->occupation}}"/>
        <x-admin.forms.input name="occupation_en" title="{{__('forms.profession-in-en')}}" type="text" value="{{$user->occupation_en}}"/>
        <x-admin.forms.input name="occupation_fr" title="{{__('forms.profession-in-fr')}}" type="text" value="{{$user->occupation_fr}}"/>
        <button class="btn btn-primary w-100">{{__('forms.edit-membres')}}</button>
    </form>
@endsection
