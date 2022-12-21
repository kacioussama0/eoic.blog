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
            <label for="name">{{__('forms.full-name')}}</label>
            <input type="text" name="name" id="name"  class="form-control" value="{{$user -> name}}">
        </div>

        <div class="form-group">
            <label for="email">{{__('forms.email')}}</label>
            <input type="email" name="email" id="name"  class="form-control" value="{{$user -> email}}">
        </div>



        <button class="btn btn-primary w-100">{{__('forms.edit-member')}}</button>

    </form>





@endsection
