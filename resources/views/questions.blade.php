@extends('blog-layout.app')
@section('title','أسئلة شائعة')



@section('content')

    <div class="container py-5">

        <h1 class="title mb-5">أسئلة شائعة</h1>

        <ul uk-accordion>

            @foreach($questions as $question)
                <li class="uk-card-secondary p-3">
                    <a class="uk-accordion-title uk-card-title" href="#">{{$question->question}}</a>
                    <div class="uk-accordion-content uk-card-body">
                        <p>{{$question->answer}}</p>
                    </div>
                </li>

            @endforeach

        </ul>
    </div>
@endsection
