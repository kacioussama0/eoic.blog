@extends('admin.layouts.app')
@section('title','إضافة عضو')
@section('icon','bi bi-people-fill')



@section('content')

    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <x-admin.forms.input name="name" title="الإسم" type="text" value="{{old('name')}}"/>
        <x-admin.forms.input name="email" title="البريد الإلكتروني" type="email" value="{{old('email')}}"/>
        <x-admin.forms.input name="password" title="كلمة السر" type="password" value="{{old('password')}}"/>

        <button class="btn btn-primary w-100 mt-3">إضافة عضو</button>

    </form>





@endsection
