@extends('admin.layouts.app')
@section('title','تعديل المجلة')



@section('content')
    <link href="{{asset('assets/dflip/assets/css/dflip.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dflip/assets/css/themify-icons.min.css')}}" rel="stylesheet" type="text/css">
    <form action="{{route('magazines.update',$magazine)}}" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PATCH')

        <x-admin.forms.input name="title" title="العنوان" type="text" value="{{$magazine -> title}}"/>
        <x-admin.forms.input name="thumbnail" title="الصورة" type="file" value="{{old('thumbnail')}}"/>
        <img src="{{asset('storage/' . $magazine->thumbnail)}}" alt="" width="200px" class="rounded mb-3">


        <x-admin.forms.input name="book" title="الكتاب" type="file" value="{{old('book')}}"/>

        <div class="_df_thumb"  source="{{asset('storage/' . $magazine -> book)}}" thumb="{{asset('storage/' . $magazine -> thumbnail)}}">
            <div class="_df_book-cover _df_thumb-not-found"><span class="_df_book-title">{{$magazine->title}}</span></div>
        </div>

        <div class="form-check form-switch mb-3">
            <label for="is_published">المجلة منشورة</label>
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" @if($magazine->is_published) checked @endif>
        </div>




        <button class="btn btn-primary w-100">تعديل المجلة</button>

    </form>


    <script src="{{asset('assets/dflip/assets/js/dflip.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

@endsection
