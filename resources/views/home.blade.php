@extends('blog-layout.app')
@section('title',__('home.home'))

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/breaking-news-ticker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/post.carousel.css')}}">

    <link rel="stylesheet" href="{{asset('assets/photoswipe/photoswipe.css')}}" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.3/plyr.css" />

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
                                        <div class="carousel-content ">
                                            <div class="badge rounded-pill text-bg-secondary  mb-3"><a href="{{url('category/' . $post ->category->name())}}" class="link-dark">{{$post ->category -> name()}}</a></div>
                                            <div class="mb-3">{{$post ->created_at -> diffForHumans()}}</div>
                                            <h4 class="fw-6"><a href="{{route('post.slug', $post->slug())}}" class="link-light ">{{$post -> title()}}</a></h4>
                                        </div>
                                        <img src="{{File::exists('storage/' . $post -> image()) ? asset('storage/' . $post -> image()) : asset('assets/imgs/logo.svg') }}" class="d-block w-100 " alt="...">
                                        <span style="font-size: 25px;z-index: 99" class="position-absolute bottom-0 end-0 m-2">
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

    <div class="section ">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-8">

                    <h3 class="category-title mb-3 mx-auto"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2">{{__('home.last-posts')}} </h3>

                    <div class="row g-3 mb-3 ">


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
                                @foreach($magazines as $magazine)

                                    @if($magazine->title())
                                          <div class="col-md-3 col-lg-4 col-xl-3 col-sm-6 col wow flipInY  text-center" style=".df-container-lg {background: blue};">
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
                    <div class="plyr__video-embed ratio ratio-16x9" id="player">
                        <iframe
                            src="https://www.youtube.com/watch?v=3h6RMkjDR50&ab_channel=%D8%A7%D9%84%D9%87%D9%8A%D8%A6%D8%A9%D8%A7%D9%84%D8%A3%D9%88%D8%B1%D9%88%D8%A8%D9%8A%D8%A9%D9%84%D9%84%D9%85%D8%B1%D8%A7%D9%83%D8%B2%D8%A7%D9%84%D8%A5%D8%B3%D9%84%D8%A7%D9%85%D9%8A%D8%A9"
                            allowfullscreen
                            allowtransparency
                            allow="autoplay"
                        ></iframe>
                    </div>

                </div>


            </section>

        <!-- End Video -->


            @foreach($categories->take(1) as $key=> $category)

            @if( count($category -> posts) && count($category->posts->where('title_en','<>',null)))

            <div @if($key % 2 == 1) style="background-color: #e9f2f61f" @endif>

                <section class="ftco-section">

                    <div class="container-lg">
                        <h2 class="heading-section mb-5 pb-md-4">{{$category->name()}}</h2>
                        <div class="featured-carousel owl-carousel">

                                @foreach($category->posts as $post)


                                            <div class="item">
                                                <div class="work">
                                                    <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url('{{asset('storage/' . $post -> image())}}');">
                                                        <a href="#" class="icon d-flex align-items-center justify-content-center">
                                                            <span class="ion-ios-search"></span>
                                                        </a>
                                                    </div>
                                                    <div class="text pt-3 w-100 text-center">
                                                        <h3><a href="#">Work 01</a></h3>
                                                        <span>Web Design</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                               @endforeach
                        </div>

                    </section>

            </div>


                @endif
            @endforeach




            <article class="my-3">
                <div class="container-lg">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="category-title"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2">{{__('home.cards')}} </h3>
                            <div class="pswp-gallery pswp-gallery--single-column" id="gallery--getting-started">

                                <div class="row g-3">

                                    @foreach($cards as $card)
                                        <div class="col-md-6">
                                            <div class="card border-secondary border-2 overflow-hidden wow flipInY">
                                                <a href="#"
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
                    </div>
            </article>


        </div>
    </div>




    @section('script')

            <script src="{{asset('assets/dflip/assets/js/dflip.min.js')}}"></script>
            <script src="{{asset('assets/dflip/assets/js/metaboxes.min.js')}}"></script>
            <script src="{{asset('assets/js/ideabox-news-ticker.min.js')}}"></script>

        <script>

            $(document).ready(function(){

                $('#newsTicker2').breakingNews({

                    @if(session()->get('locale') == 'ar')
                    direction: 'rtl',
                    @endif
                    radius: 5
                });

            });

        </script>

            <script src="https://cdn.plyr.io/3.7.3/plyr.polyfilled.js"></script>

            <script>
                const player = new Plyr('#player');
            </script>

            <script type="module">
                // Include Lightbox
                import PhotoSwipeLightbox from '{{asset('assets/photoswipe/photoswipe-lightbox.esm.js')}}';

                const lightbox = new PhotoSwipeLightbox({
                    // may select multiple "galleries"
                    gallery: '#gallery--getting-started',

                    // Elements within gallery (slides)
                    children: 'a',


                    showHideAnimationType: 'zoom',
                    showAnimationDuration: 300,
                    hideAnimationDuration: 300,

                    // setup PhotoSwipe Core dynamic import
                    pswpModule: () => import('{{asset('assets/photoswipe/photoswipe.esm.js')}}')
                });
                lightbox.init();
            </script>

            <script src="{{asset('assets/js/owl.js')}}"></script>

        <script>
            (function($) {

                "use strict";

                var fullHeight = function() {

                    $('.js-fullheight').css('height', $(window).height());
                    $(window).resize(function(){
                        $('.js-fullheight').css('height', $(window).height());
                    });

                };
                fullHeight();

                var carousel = function() {
                    $('.featured-carousel').owlCarousel({
                        loop:true,
                        autoplay: true,
                        margin:30,
                        animateOut: 'fadeOut',
                        animateIn: 'fadeIn',
                        nav:true,
                        dots: true,
                        autoplayHoverPause: false,
                        items: 1,
                        navText : ["<span class='ion-ios-arrow-back'></span>","<span class='ion-ios-arrow-forward'></span>"],
                        responsive:{
                            0:{
                                items:1
                            },
                            600:{
                                items:2
                            },
                            1000:{
                                items:3
                            }
                        }
                    });

                };
                carousel();

            })(jQuery);
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





