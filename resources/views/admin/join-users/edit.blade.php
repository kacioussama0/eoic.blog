@extends('admin.layouts.app')
@section('title','إضافة عضو')



@section('content')
    <form action="{{route('joined-users.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-admin.forms.input name="full_name" title="الإسم الكامل" type="text" value="{{$user->full_name}}"/>
        <x-admin.forms.input name="age" title="العمر" type="number" value="{{$user->age}}"/>
        <x-admin.forms.input name="image" title="الصورة" type="file" value="{{old('image')}}"/>
        <x-admin.forms.input name="profession" title="المهنة" type="text" value="{{$user->profession}}"/>
        <x-admin.forms.input name="occupation" title="الصفة" type="text" value="{{$user->occupation}}"/>
        <button class="btn btn-primary w-100">إضافة العضو</button>
    </form>
@endsection
