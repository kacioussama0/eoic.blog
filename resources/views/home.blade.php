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




                    <div id="carouselExampleFade" class="carousel slide overflow-hidden  rounded-4 rounded-top-0 shadow-sm mb-5" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="carousel-content">
                                    {{$slider_posts[0] ->created_at -> diffForHumans()}}
                                    <h3 class="text-truncate" style="max-width: 100%"><a href="{{route('post.slug', $slider_posts[0]->slug)}}" >{{$slider_posts[0] -> title}}</a></h3>
                                </div>
                                <img src="{{File::exists('storage/' . $slider_posts[0] -> image) ? asset('storage/' . $slider_posts[0] -> image) : asset('assets/imgs/logo.svg') }}" class="d-block w-100" alt="...">
                            </div>

                            @foreach($slider_posts->skip(1) as $post)

                                <div class="carousel-item">
                                    <div class="carousel-content">
                                        {{$post ->created_at -> diffForHumans()}}
                                        <h3 class="text-truncate" style="max-width: 100%"><a href="{{route('post.slug', $post->slug)}}" >{{$post -> title}}</a></h3>
                                    </div>
                                    <img src="{{File::exists('storage/' . $post -> image) ? asset('storage/' . $post -> image) : asset('assets/imgs/logo.svg') }}" class="d-block w-100" alt="...">
                                </div>

                            @endforeach

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

    <div class="section ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">

                    <h3><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2">أخر المقالات </h3>

                    <div class="row g-3">
                            @foreach($last_posts as $post)
                                <div class="col-md-6">
                                    <x-article :post="$post"/>
                                </div>
                            @endforeach
                        </div>

                    <div class="card overflow-hidden border-primary">
                        <div class="card-header p-0 bg-transparent ">
                            <h3 class="title my-0 py-3">المجلات</h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                @foreach($magazines as $magazine)


                                          <div class="col-md-4 col-12 col-sm-6">
                                              <div class="_df_thumb"  source="{{asset('storage/' . $magazine -> book)}}" thumb="{{asset('storage/' . $magazine -> thumbnail)}}">
                                                  <div class="_df_book-cover _df_thumb-not-found"><span class="_df_book-title">{{$magazine->title}}</span></div>
                                              </div>
                                          </div>


                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>



                @include('blog-layout.side')




                </div>


            <section class="mt-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title">فيديوهات</h2>
                            <div class="owl-carousel owl-theme">
                                <div class="item-video" data-merge="3">
                                    <a class="owl-video" href="https://vimeo.com/23924346"></a>
                                </div>
                                <div class="item-video" data-merge="1">
                                    <a class="owl-video" href="https://www.youtube.com/watch?v=JpxsRwnRwCQ"></a>
                                </div>
                                <div class="item-video" data-merge="2">
                                    <a class="owl-video" href="https://www.youtube.com/watch?v=FBu_jxT1PkA"></a>
                                </div>
                                <div class="item-video" data-merge="1">
                                    <a class="owl-video" href="https://www.youtube.com/watch?v=oy18DJwy5lI"></a>
                                </div>
                                <div class="item-video" data-merge="2">
                                    <a class="owl-video" href="https://www.youtube.com/watch?v=H3jLkJrhHKQ"></a>
                                </div>
                                <div class="item-video" data-merge="3">
                                    <a class="owl-video" href="https://www.youtube.com/watch?v=g3J4VxWIM6s"></a>
                                </div>
                                <div class="item-video" data-merge="1">
                                    <a class="owl-video" href="https://www.youtube.com/watch?v=0fhoIate4qI"></a>
                                </div>
                                <div class="item-video" data-merge="2">
                                    <a class="owl-video" href="https://www.youtube.com/watch?v=EF_kj2ojZaE"></a>
                                </div>
                        </div>
                    </div>
                </div>
            </section>

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



