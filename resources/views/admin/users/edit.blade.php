@extends('admin.layouts.app')
@section('title','تعديل عضو')
@section('icon','bi bi-people-fill')


@section('content')

    @if($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach

            </ul>

        </div>

    @endif
    <form action="{{route('users.update',$user)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">الإسم</label>
            <input type="text" name="name" id="name" placeholder="أدخل الإسم"  class="form-control" value="{{$user -> name}}">
        </div>

        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" name="email" id="name" placeholder="أدخل البريد الإلكتروني" class="form-control" value="{{$user -> email}}">
        </div>



        <button class="btn btn-primary w-100">تعديل عضو</button>

    </form>





@endsection
