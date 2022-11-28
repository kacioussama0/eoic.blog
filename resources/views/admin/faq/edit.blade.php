@extends('admin.layouts.app')
@section('title','تعديل سؤال شائع')



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
    <form action="{{route('faq.update',$question)}}" method="POST">


        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="question" class="form-label">السؤال</label>
            <input type="text" name="question" id="question" class="form-control" placeholder="أدخل سؤال" value="{{$question -> question}}">
        </div>





        <div class="form-group">
            <label for="answer" class="form-label">جواب السؤال</label>
            <textarea name="answer" id="answer"  class="form-control">
                {{$question -> answer}}
            </textarea>
        </div>

        <button class="btn btn-primary w-100">تعديل السؤال</button>

    </form>



@endsection
