@extends('blog-layout.app')

@section('title',__('home.home'))
@section('content')


    <link rel="stylesheet" href="{{asset('assets/css/breaking-news-ticker.min.css')}}">

    @if(count($news_titles))

    <div class="bn-breaking-news position-fixed bottom-0 end-0" id="newsTicker2" style="z-index: 999">
        <div class="bn-label">أخبار عاجلة</div>
        <div class="bn-news">
            <ul>
                @foreach($news_titles as $title)

                    <li>
                        <span class="bn-seperator ms-3" style="background-image:url('{{asset('assets/imgs/zellig.svg')}}');"></span>

                        <a href="#">{{$title->title()}}</a>


                    </li>

                @endforeach
            </ul>
        </div>

    </div>
@endif
@if(count($categories))





    <div class="section">
        <div class="container-lg">
                    <div id="LastPosts" class="carousel slide overflow-hidden position-relative  rounded-4 rounded-top-0 shadow mb-5" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            @foreach($slider_posts as  $key => $post)
                                @if($post->title() != null )
                                    @php $active = $key @endphp
                                    @break
                                @endif
                            @endforeach


                        @foreach($slider_posts as  $key => $post)


                                @if($post->title() != null )

                                    <div class="carousel-item @if($key == $active) active @endif">
                                        <div class="carousel-content">
                                            <div class="badge rounded-pill text-bg-secondary  mb-3"><a href="{{url('category/' . $post ->category->name())}}" class="link-dark">{{$post ->category -> name()}}</a></div>
                                            <div class="mb-3">{{$post ->created_at -> diffForHumans()}}</div>
                                            <h4><a href="{{route('post.slug', $post->slug())}}" class="link-light">{{$post -> title()}}</a></h4>
                                        </div>
                                        <img src="{{File::exists('storage/' . $post -> image()) ? asset('storage/' . $post -> image()) : asset('assets/imgs/logo.svg') }}" class="d-block w-100" alt="...">
                                        <span style="font-size: 25px;z-index: 999" class="position-absolute bottom-0 end-0 m-2">
                                          <button class="bg-transparent border-0 me-3" type="button" data-bs-toggle="collapse" data-bs-target="#slug" aria-expanded="false" aria-controls="slug">
                                            <i class="fa-solid fa-share me-1 pe-auto text-light"></i>
                                           </button>
                                        </span>

                                        <div class="collapse  bg-white position-absolute bottom-0 end-0 m-5 rounded" id="slug" style="z-index: 9999;font-size: 20px;">
                                            <div class="p-3">
                                                <a href="https://www.facebook.com/sharer.php?u={{route('post.slug', $post->slug())}}" target="_blank" class="me-2" style="color: #4267B2"><i class="fa-brands fa-facebook"></i></a>
                                                <a href="https://www.facebook.com/dialog/send?app_id=5303202981&display=popup&link={{route('post.slug', $post->slug())}}&redirect_uri={{route('post.slug', $post->slug())}}" class="me-2" style="color: #00B2FF"><i class="fa-brands fa-facebook-messenger" ></i></a>
                                                <a href="#" class="me-2"><i class="fa-brands fa-whatsapp" style="color: #25D366"></i></a>
                                                <a href="https://twitter.com/intent/tweet?text={{$post->title()}}&url={{route('post.slug', $post->slug())}}" target="_blank" class="me-2" style="color: #1DA1F2"><i class="fa-brands fa-twitter"></i></a>
                                            </div>

                                        </div>
                                    </div>






                                @endif
                            @endforeach

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#LastPosts" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#LastPosts" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>



                    </div>


    </div>

    <div class="section ">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-8">

                    <h3 class="category-title mb-3"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2">{{__('home.last-posts')}} </h3>

                    <div class="row g-3 mb-3">


                            @foreach($last_posts as $post)

                                @if($post->title() != null )

                                    <div class="col-md-6">
                                        <x-article :post="$post"/>
                                    </div>
                                @endif
                            @endforeach
                        </div>


                <!-- Start Magazine -->

                @if(count($magazines))
                    <div class="card rounded-4  overflow-hidden border-primary mb-3">
                        <div class="card-header p-0 bg-transparent border-primary">
                            <h3 class=" my-0 p-3">
                                <a href="{{url('books')}}" class="link-primary"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2"> {{__('home.magazines')}} </a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($magazines as $magazine)

                                    @if($magazine->title())
                                          <div class="col-md-4 col-12 col-sm-6 text-center" style=".df-container-lg {background: blue};">
                                              <div class="_df_thumb" source="{{asset('storage/' . $magazine -> book())}}" thumb="{{asset('storage/' . $magazine -> thumbnail())}}">
                                                  {{$magazine->title()}}
                                              </div>
                                          </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                </div>


                <!-- End Magazine -->


                <!-- Start Side Bar -->
                @include('blog-layout.side')
                <!-- End Side Bar -->


                </div>




        <!-- Start Video -->
            <section class="mt-2 mb-3">
                <div class="container-lg">

                            <h3 class="category-title"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2">{{__('home.videos')}} </h3>
                        <div class="row">
                            <div class="col-md-12 rounded-4 shadow">

                                <div class=" overflow-hidden plyr__video-embed " id="player">
                                    <iframe src="{{$videos[0]->url}}"
                                            allowfullscreen
                                            allowtransparency
                                            allow="autoplay">
                                    </iframe>
                                </div>
                            </div>


                        </div>




                        </div>
            </section>

        <!-- End Video -->




            <article class="my-3">
                <div class="container-lg">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="category-title"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2">{{__('home.activities')}} </h3>
                            <livewire:posts />
                        </div>
                    </div>
            </article>


        </div>
    </div>


    @else

    <div class="container-lg py-5">

        <div class="alert alert-danger ">
            <h1 class="text-center display-3 mb-0">{{__('لا توجد مقالات متاحة')}}</h1>
        </div>

    </div>


@endif



        <script src="{{asset('assets/js/ideabox-news-ticker.min.js')}}"></script>
        <script>

            $(document).ready(function(){

                $('#newsTicker2').breakingNews({
                    effect: 'slide-down',
                    @if(session()->get('locale') == 'ar')
                    direction: 'rtl',
                    @endif
                    radius: 5
                });

            });

        </script>
@endsection



