@extends('admin.layouts.app')
@section('title','تعديل عضو')



@section('content')
    <form action="{{route('organization-members.update',$user)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-admin.forms.input name="name" title="الإسم الكامل" type="text" value="{{$user->name}}"/>
        <x-admin.forms.input name="name_latin" title="الإسم الكامل بالاتينية" type="text" value="{{$user->name_latin}}"/>
        <x-admin.forms.input name="age" title="العمر" type="number" value="{{$user->age}}"/>
        <x-admin.forms.input name="avatar" title="الصورة" type="file" value="{{old('avatar')}}"/>
        <img src="{{asset('storage/' . $user -> avatar)}}"  width="200" class="rounded"/>
        <x-admin.forms.input name="occupation" title="الصفة" type="text" value="{{$user->occupation}}"/>
        <x-admin.forms.input name="occupation_en" title="الصفة بالإنجليزية" type="text" value="{{$user->occupation_en}}"/>
        <x-admin.forms.input name="occupation_fr" title="الصفة بالفرنسية" type="text" value="{{$user->occupation_fr}}"/>
        <button class="btn btn-primary w-100">تعديل العضو</button>
    </form>
@endsection
