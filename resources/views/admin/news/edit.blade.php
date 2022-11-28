@extends('admin.layouts.app')
@section('title','تعديل الخبر')



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
    <form action="{{route('news.update',$news)}}" method="POST">


        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title" class="form-label">العنوان</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="أدخل عنوان الخبر" value="{{$news->title}}">
        </div>

        <div class="form-check form-switch mb-3">
            <label for="is_published">الخبر منشور</label>
            <input class="form-check-input" type="checkbox" name="is_published" @if($news -> is_published) checked @endif id="is_published" value="1">
        </div>



        <button class="btn btn-primary w-100">تعديل الخبر</button>

    </form>



@endsection
