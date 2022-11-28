@extends('blog-layout.app')

@section('title','الرئيسية')

@section('content')


@if(count($categories))

    @if(count($news_title))

    <div class="uk-width-1-1">

        <div class="news-container">
            <div class="title1">
                أخر الأخبار
            </div>

            <ul>
                @foreach($news_title as $news)
                    <li>{{$news -> title}}</li>
                @endforeach
            </ul>
        </div>

    </div>
@endif



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">

            <h1 class="title mx-auto my-4">{{__('أخر الأخبار')}}</h1>

            <div id="hot-post" class="row hot-post">
                <div class="col-md-12 hot-post-left mb-2  mb-md-0">

                    <div id="carouselExampleFade" class="carousel slide carousel-fade overflow-hidden rounded " data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="carousel-content">
                                    {{$first_post ->created_at -> diffForHumans()}}
                                    <h3 class="text-truncate" style="max-width: 100%"><a href="{{route('post.slug', $first_post->slug)}}" >{{$first_post -> title}}</a></h3>
                                </div>
                                <img src="{{!File::exists($first_post -> image) ? asset('storage/' . $first_post -> image) : asset('imgs/logo.svg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-content">
                                    {{$second_post ->created_at -> diffForHumans()}}
                                    <h3 class="text-truncate" style="max-width: 200px"><a href="{{route('post.slug', $second_post->slug)}}" >{{$second_post -> title}}</a></h3>
                                </div>
                                <img src="{{!File::exists($second_post -> image) ? asset('storage/' . $second_post -> image) : asset('imgs/logo.svg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-content">
                                    {{$third_post ->created_at -> diffForHumans()}}
                                    <h3 class="text-truncate" style="max-width: 200px"><a href="{{route('post.slug', $third_post->slug)}}" >{{$third_post -> title}}</a></h3>
                                </div>
                                <img src="{{!File::exists($third_post -> image) ? asset('storage/' . $third_post -> image) : asset('imgs/logo.svg') }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- SECTION -->
    <div class="section ">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8 ">
                    <!-- row -->
                    <div class="row  ">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="title">أخر المقالات</h2>
                            </div>
                        </div>
                        <!-- post -->
                        @foreach($last_posts as $post)
                            <div class="col-md-6 wow tada">
                                <x-article :post="$post"/>
                            </div>
                        @endforeach
                    <!-- /post -->




                    </div>



                    @foreach($categories as $category)

                        @if(count($category -> posts -> take(3)))
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="section-title">
                                        <h2 class="title">{{$category -> name}}</h2>
                                    </div>

                                </div>

                                @foreach($category -> posts -> where('is_published','on') as $post)


                                    <div class="col-md-4  wow bounceInRight" >
                                        <x-article :post="$post" />
                                    </div>
                                @endforeach
                            </div>

                        @endif
                    @endforeach


                </div>

                @include('blog-layout.side')


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ad -->
                <div class="col-md-12 section-row text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="{{asset('imgs/logo.svg')}}" alt="">
                    </a>
                </div>
                <!-- /ad -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-4">

                    <!-- Ad widget -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{asset('imgs/logo.svg')}}" alt="">
                        </a>
                    </div>
                    <!-- /Ad widget -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    @else

    <div class="container py-5">

        <div class="alert alert-danger ">
            <h1 class="text-center display-3 mb-0">لا توجد مقالات متاحة</h1>
        </div>

    </div>

@endif
@endsection



