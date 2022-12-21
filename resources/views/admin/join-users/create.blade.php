@extends('admin.layouts.app')
@section('title','إضافة عضو')



@section('content')
    <form action="{{route('organization-members.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-admin.forms.input name="name" title="الإسم الكامل" type="text" value="{{old('name')}}"/>
        <x-admin.forms.input name="name_latin" title="الإسم الكامل بالاتينية" type="text" value="{{old('name_latin')}}"/>
        <x-admin.forms.input name="age" title="العمر" type="number" value="{{old('age')}}"/>
        <x-admin.forms.input name="avatar" title="الصورة" type="file" value="{{old('avatar')}}"/>
        <x-admin.forms.input name="occupation" title="الصفة" type="text" value="{{old('occupation')}}"/>
        <x-admin.forms.input name="occupation_en" title="الصفة بالإنجليزية" type="text" value="{{old('occupation_en')}}"/>
        <x-admin.forms.input name="occupation_fr" title="الصفة بالفرنسية" type="text" value="{{old('occupation_fr')}}"/>
        <button class="btn btn-primary w-100">إضافة العضو</button>
    </form>
@endsection
