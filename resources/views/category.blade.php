@extends('blog-layout.app')
@section('title',$category -> name)

@section('content')


    <div class="page-header" style="background-image: url('{{asset('imgs/aok.svg')}}') ; background-size: cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-md-10 text-center">
                        <h1 class="text-uppercase">{{$category -> name}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-8">

                    @foreach($posts as $post)
                        <x-article :post="$post"/>
                    @endforeach

                        <div class="section-row loadmore text-center">
                            {{$posts->links()}}

                        </div>
                    </div>
                @include('blog-layout.side')

                </div>


            </div>
        </div>



@endsection
