@extends('blog-layout.app')

@section('content')

    <!-- PAGE HEADER -->
    <div class="page-header" style="background-image: url('{{asset('imgs/aok.svg')}}') ; background-size: cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-offset-1 col-md-10 text-center">
                    <h1 class="text-uppercase"># {{$tag -> name}}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->

    <!-- /HEADER -->

    <!-- SECTION -->
    <div class="section my-5">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <!-- post -->
                    @foreach($tag->posts as $post)



                        <x-article :post="$post"/>


                    @endforeach

                </div>

                @include('blog-layout.side')


            </div>


        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->


@endsection
