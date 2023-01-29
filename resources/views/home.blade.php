@extends('blog-layout.app')
@section('title',__('home.home'))

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/breaking-news-ticker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/photoswipe/photoswipe.css')}}" />
    <link href="{{asset('assets/dflip/css/dflip.min.css')}}" rel="stylesheet" >
    <script src="{{asset('assets/dflip/js/metaboxes.min.js')}}"></script>

    <link href="{{asset('assets/dflip/css/themify-icons.min.css')}}" rel="stylesheet">
    <script src="{{asset('assets/dflip/js/dflip.min.js')}}"></script>
@endsection

@section('content')



    @if(count($news_titles))

    <div class="bn-breaking-news position-fixed bottom-0 end-0 w-100" id="newsTicker2" style="z-index: 999">
        <div class="bn-label">{{__('home.important-news')}}</div>
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
        <div class="container-lg px-0 px-lg-2">

            <!-- Start Carousel -->

            <div id="LastPosts" class="carousel slide overflow-hidden position-relative  rounded-4 rounded-top-0 shadow mb-5" data-bs-ride="carousel">

                        <div class="carousel-inner ">

                            @foreach($slider_posts as  $key => $post)
                                @if($post->title() != null )
                                    @php $active = $key @endphp
                                    @break
                                @endif
                            @endforeach


                        @foreach($slider_posts as  $key => $post)


                                @if($post->title() != null )

                                    <div class="carousel-item  @if($key == $active) active @endif">
                                        <div class="carousel-content mb-4">
                                            <div class="mb-3">{{$post ->created_at -> diffForHumans()}}</div>

                                            <h4 class="lh-lg"><a href="{{route('post.slug', $post->slug())}}" class="link-light ">{{$post -> title()}}</a></h4>
                                            <div class="badge rounded-pill text-bg-secondary  mb-3"><a href="{{url('category/' . $post ->category->name())}}" class="link-dark">{{$post ->category -> name()}}</a></div>


                                        </div>
                                        <img src="{{File::exists('storage/' . $post -> image()) ? asset('storage/' . $post -> image()) : asset('assets/imgs/logo.svg') }}" class="d-block w-100 " alt="...">
                                        <span style="font-size: 25px;z-index: 99" class="position-absolute bottom-0 mb-2 end-0 m-2">
                                          <button class="bg-transparent border-0 me-3" type="button" data-bs-toggle="collapse" data-bs-target="#slug" aria-expanded="false" aria-controls="slug">
                                            <i class="fa-solid fa-share me-1 pe-auto text-light"></i>
                                           </button>
                                        </span>

                                        <div class="collapse  bg-white position-absolute bottom-0 end-0 m-5 rounded " id="slug" style="z-index: 99;font-size: 20px;">
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


                    <div class="carousel-indicators end-0 m-0 w-auto mb-2">

                        @foreach($slider_posts as  $key => $post)
                            @if($post->title() != null )
                                @php $active = $key @endphp
                                @break
                            @endif
                        @endforeach


                    @foreach($slider_posts as  $key => $post)


                            @if($post->title() != null )
                                <button type="button" data-bs-target="#LastPosts" data-bs-slide-to="{{$key}}" class="@if($key == 0) active @endif rounded-circle" aria-current="true" aria-label="Slide {{$key}}" style="width: 10px;height: 10px"></button>
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

            <!-- End Carousel -->


        </div>

    <div class="section">
        <div class="container-lg">
            <div class="row ">
                <div class="col-lg-8 order-1 order-lg-0">

                    <h3 class="mb-4"><i class="fa-light fa-newspaper me-2"></i>{{__('home.last-posts')}}</h3>

                    <div class="row g-3 mb-3">

                            @foreach($last_posts as $post)

                                @if($post->title() != null )
                                    <div class="col-md-6 wow fadeIn">
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
                                @foreach($magazines->take(12) as $magazine)



                                    @if($magazine->title() != null)
                                          <div class="col-sm-6 col-md-3 col-lg-4 col wow flipInY  text-center" >
                                              <div class="_df_thumb" source="{{asset('storage/' . $magazine -> book())}}"  thumb="{{asset('storage/' . $magazine -> thumbnail())}}">
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


                <!-- Start Video -->
                <section class="mt-2 mb-3">
                    <div class="container-lg">
                        <h3 class="mb-4"><i class="fa-light fa-video me-2"></i>{{__('home.videos')}} </h3>

                        <div class="row">

                            @foreach($videos as $video)


                                <div class="col-md-4 wow fadeInUp">

                                    <figure class="media">
                                        <oembed url="{{$video -> url}}"></oembed>
                                    </figure>
                                </div>

                            @endforeach

                        </div>


                    </div>


                </section>

                <!-- End Video -->



            </div>







            @foreach($categories as $key => $category)

                @php

                    if(config('app.locale') == 'ar') {
                            $category = $category->posts()->where('title' ,'<>', null)->latest()->get();

                        }
                        elseif(config('app.locale') == 'fr') {
                            $category = $category->posts()->where('title_fr' ,'<>', null)->latest()->get();
                        }else {
                            $category = $category->posts()->where('title_en', '<>' , 'null')->latest()->get();
                        }


                @endphp

            @if(count($category))

            <div class="py-3" @if($key % 2 == 0) style="background: #fcfcfc" @endif>

                    <div class="container-lg">
                        <h2 class="heading-section position-relative  @if(session()->get('locale') == 'ar') {{'special-heading-ar'}} @else {{'special-heading'}} @endif mb-5 mt-3">
                                {{$category[0]->category->name()}}
                        </h2>

                    <div class="row">
                        @foreach($category  ->take(3) as $post)
                            <div class="col-md-6 col-lg-4 wow fadeIn">
                                <x-article :post="$post"/>
                            </div>
                       @endforeach
                    </div>

                    </div>

            </div>


                @endif
            @endforeach



        @if(count($cards))
            <article class="my-3">
                <div class="container-lg">
                            <h3 class="category-title"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2">{{__('home.cards')}} </h3>
                    <div class="pswp-gallery pswp-gallery--single-column" id="gallery--getting-started">

                        <div class="row g-3">

                            @foreach($cards as $card)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="card border-primary overflow-hidden">
                                        <a href="https://unsplash.com"
                                           data-pswp-src="{{asset('storage/' . $card -> image())}}"
                                           data-pswp-width="2500"
                                           data-pswp-height="1666"
                                           target="_blank">
                                            <img src="{{asset('storage/' . $card -> image())}}" class="img-fluid" alt="" />
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </article>
        @endif


    </div>






    @section('scripts')
            <script type="module">
                // Include Lightbox
                import PhotoSwipeLightbox from '{{asset('assets/photoswipe/photoswipe-lightbox.esm.min.js')}}';

                const lightbox = new PhotoSwipeLightbox({
                    // may select multiple "galleries"
                    gallery: '#gallery--getting-started',

                    // Elements within gallery (slides)
                    children: 'a',


                    showHideAnimationType: 'zoom',
                    showAnimationDuration: 300,
                    hideAnimationDuration: 300,

                    // setup PhotoSwipe Core dynamic import
                    pswpModule: () => import('{{asset('assets/photoswipe/photoswipe.esm.min.js')}}')
                });
                lightbox.init();
            </script>

        <script src="{{asset('assets/js/ideabox-news-ticker.min.js')}}"></script>

        <script>

            $(document).ready(function(){

                $('#newsTicker2').breakingNews({
                    effect: 'typography',
                    delayTimer: 5000,
                    fontSize: 14,
                    @if(session()->get('locale') == 'ar')
                    direction: 'rtl',
                    @endif
                });

            });

        </script>









    @endsection

    @else

    <div class="container-lg py-5">

        <div class="alert alert-danger ">
            <h1 class="text-center display-3 mb-0">{{__('لا توجد مقالات متاحة')}}</h1>
        </div>

    </div>


@endif






@endsection





