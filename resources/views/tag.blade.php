@extends('blog-layout.app')

@section('content')

    <!-- PAGE HEADER -->
    <div class="page-header" style="background-image: url('{{asset('imgs/aok.svg')}}') ; background-size: cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-offset-1 col-md-10 text-center">
                    <h1 class="text-uppercase"># {{$tag -> name()}}</h1>
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

                    @if(count($tag -> posts))


                        @foreach($posts as $post)
                            @if(!empty($post -> title()))
                                <div class="post post-row border-bottom pb-4 border-primary border-opacity-25">
                                    <a class="post-img" href="{{url('/posts/' . $post -> slug())}}"><img src="{{asset('storage/' . $post -> image)}}" alt="" class="rounded" style="height: 200px !important;"></a>
                                    <div class="post-body">

                                        <h3 class="post-title"><a href="{{url('posts/' . $post  -> slug())}}">{{$post -> title()}}</a></h3>
                                        <p class="text-truncate">{!! Str::limit(strip_tags($post -> content()) ,100)!!}</p>

                                        <ul class="post-meta">
                                            <li><a href="{{url('category/' . $post -> category -> name())}}">{{$post -> category -> name()}}</a></li>
                                            <li>{{$post ->created_at -> diffForHumans()}}</li>

                                        </ul>
                                        <div class="mt-3">
                                            @foreach($post -> tags as $tag)

                                                <a href="{{route('tag.show',$tag -> id)}}" class="badge bg-primary link-light badge-pill">#{{$tag -> name()}}</a>

                                            @endforeach
                                        </div>
                                        <div>

                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <div class="section-row loadmore text-center">
                            {{$posts->links()}}

                        </div>

                    @else
                        <h2 class="alert alert-warning">{{__('لا يوجد مقالات')}}</h2>

                    @endif

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
