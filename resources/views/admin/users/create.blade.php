@extends('admin.layouts.app')
@section('title', __('forms.add-members'))
@section('icon','bi bi-people-fill')



@section('content')

    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <x-admin.forms.input name="name" title="{{__('forms.full-name')}}" type="text" value="{{old('name')}}"/>
        <x-admin.forms.input name="email" title="{{__('forms.email')}}" type="email" value="{{old('email')}}"/>
        <x-admin.forms.input name="password" title="{{__('forms.password')}}" type="password" value="{{old('password')}}"/>

        <button class="btn btn-primary w-100 mt-3">{{__('forms.edit-membres')}}</button>

    </form>





@endsection
