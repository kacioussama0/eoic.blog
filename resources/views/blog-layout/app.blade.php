@php
$navCategories = \App\Models\Category::all()->take(6);
$settings = \App\Models\Setting::first();
@endphp

<!-- Made By SKTE :) -->
<!-- Zakaria Seggar Front End -->
<!-- Kaci Oussama Back End -->

<!DOCTYPE html>
<html lang="{{session()->get('locale')}}" dir="@if(session()->get('locale') == 'ar'){{'rtl'}}@else{{'ltr'}}@endif">
<head>
    <!-- Start Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="{{$settings -> display_name()}}">
    <meta name="description" content="{{$settings -> description()}}">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Arabic">
    <!-- End Meta -->
    <link rel='icon' href='{{asset('assets/imgs/logo.svg')}}'>
    <title>{{$settings->display_name()}} | @yield('title')</title>
    <!-- Start Links -->
    @if(session()->get('locale') == 'ar')
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.rtl.css')}}">
    @else
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    @endif
    <link rel="stylesheet" href='{{asset('assets/fontawesome/css/all.min.css')}}'>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/blog.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/blog_style.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/animate.css')}}" />
    @if(session()->get('locale') != 'ar')
        <style>
            * {
                font-family: 'Cairo',sans-serif !important;
            }
        </style>
    @endif
    <link href="{{asset('assets/dflip/assets/css/dflip.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dflip/assets/css/themify-icons.min.css')}}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"/>
    @yield('style')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(window).on('load',function(){
            $('.loader-container').fadeOut();
            $('body').removeClass('overflow-hidden');
        });
    </script>
    @livewireStyles

    <!-- End Links -->

</head>


<body class="overflow-hidden">

<x-loader/>

<!-- Start Search Modal -->

<div class="modal fade" id="search" tabindex="-1" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5 " id="search">{{__('home.search')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('search')}}" method="GET" class="d-flex" role="search">

                    <input class="form-control me-2" name="result" type="search" placeholder="" aria-label="Search">
                    <button class="btn btn-primary" type="submit">{{__('home.search')}}</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- End Search Modal -->



<!-- Start Header-->

<header class="position-sticky top-0  bg-white" style="z-index: 999">

<nav class="navbar navbar-expand-lg shadow-sm align-items-center justify-content-between">

    <div class="container-lg">

        <a data-bs-toggle="modal" class="d-lg-none align-middle" href="#search" role="button">
            <i class="fa-regular fa-magnifying-glass" style="font-size: 20px"></i>
        </a>

        <a href="{{url('/')}}" class=" wow fadeIn text-center text-lg-start">
            <img src="{{asset('assets/imgs/logo.svg')}}"  alt="Logo" class = "main-logo d-inline-block">
            <h6 class="w-50 align-middle d-inline-block mb-0 ms-2 text-center d-none d-md-inline-block">{{$settings -> display_name()}}</h6>
        </a>



        <button class="navbar-toggler p-0" type="button" style="width: 20px" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar" aria-controls="sideBar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-light fa-bars text-primary" ></i>
        </button>

        <div class="collapse navbar-nav navbar-collapse navbarScroll">

            <ul class="navbar-nav mx-auto my-2 my-lg-0 ">
                <li class="nav-item {{request()->is('/') ? "active" : '' }}">
                    <a class="nav-link {{request()->is('/') ? "active" : '' }}" aria-current="page" href="{{url('/')}}">{{__('home.home')}}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#about"  aria-expanded="false" aria-controls="about" href="#about" role="button" aria-expanded="false" aria-controls="about">
                        {{__('home.organization')}}
                    </a>

                </li>



                <div id="megaGroup">

                    <div class="collapse mega-menu" id="about" data-bs-parent="#megaGroup">
                        <div class="container p-5">
                            <div class="row justify-between">

                                <div class="col-3">
                                    <h3 class="border-start border-5 text-light ps-2 border-secondary ">{{__('home.about-organization')}}</h3>
                                    <ul>
                                        <li class=""><a href="{{route('who-we-are')}}">{{__('home.who-we-are')}}</a></li>
                                        <li><a href="">{{__('home.our-projects')}}</a></li>
                                        <li><a href="{{url('who-we-are')}}#beneficiaries">{{__('home.beneficiaries')}}</a></li>
                                        <li><a href="{{url('who-we-are')}}#countries">{{__('home.countries-deal')}}</a></li>
                                    </ul>
                                </div>



                                <div class="col-7 offset-1">
                                    <h3 class="border-start border-5 text-light ps-2 border-secondary">{{__('home.news-and-activities')}}</h3>
                                    <ul class="row">
                                        @foreach($navCategories as $category)

                                            <li  class="col"><a href="{{url('category/' . $category -> name())}}">{{$category->name()}}</a></li>
                                        @endforeach

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="collapse mega-menu" id="join" data-bs-parent="#megaGroup" >
                        <div class="container p-5">
                            <div class="row justify-content-center text-center ">

                                <div class="col-3">
                                    <a href="{{url('join-us')}}" class="text-white">
                                        <i class="fa-light fa-handshake" style="font-size: 80px"></i>
                                        <h3 class="text-white mt-3">{{__('home.join-us')}}</h3>
                                    </a>

                                </div>
                                <div class="col-3">
                                    <a href="{{url('volunteer')}}" class="text-white">
                                        <i class="fa-light fa-hand-holding-heart" style="font-size: 80px"></i>
                                        <h3 class="text-white mt-3">{{__('home.volunteer')}}</h3>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="{{route('donate')}}" class="text-white">
                                        <i class="fa-light fa-hands-holding-heart"  style="font-size: 80px"></i>
                                        <h3 class="text-white mt-3">{{__('home.donate')}}</h3>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="{{route('contact')}}" class="text-white">
                                        <i class="fa-light fa-message" style="font-size: 80px"></i>
                                        <h3 class="text-white mt-3">{{__('home.contact-us')}}</h3>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="collapse mega-menu" id="media" data-bs-parent="#megaGroup">
                        <div class="container p-5">
                            <div class="row justify-content-center text-center ">

                                <div class="col-3">
                                    <a href="" class="text-white">
                                        <i class="fa-light fa-video" style="font-size: 80px"></i>
                                        <h3 class="text-white mt-3">{{__('home.videos')}}</h3>
                                    </a>

                                </div>
                                <div class="col-3">
                                    <a href="{{url('books')}}" class="text-white">
                                        <i class="fa-brands fa-readme" style="font-size: 80px"></i>
                                        <h3 class="text-white mt-3">{{__('home.magazines')}}</h3>
                                    </a>
                                </div>

                                <div class="col-3">
                                    <a href="{{route('contact')}}" class="text-white">
                                        <i class="fa-light fa-credit-card-blank" style="font-size: 80px"></i>
                                        <h3 class="text-white mt-3">{{__('home.cards')}}</h3>
                                    </a>
                                </div>

                                <div class="col-3">
                                    <a href="{{url('category/Posts')}}" class="text-white">
                                        <i class="fa-light fa-newspaper" style="font-size: 80px"></i>
                                        <h3 class="text-white mt-3">{{__('home.posts')}}</h3>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-toggle="collapse"  data-bs-target="#join" aria-expanded="false" aria-controls="join" href="#join" role="button" aria-expanded="false" aria-controls="join">
                        {{__('home.get-closure')}}
                    </a>

                </li>





                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="media" href="#media" role="button" aria-expanded="false" aria-controls="media">
                        {{__('home.media')}}
                    </a>

                </li>



            </ul>

               <ul class="navbar-nav align-items-center">

                   <a data-bs-toggle="modal" class="me-3" href="#search" role="button"><i class="fa-regular fa-magnifying-glass" style="font-size: 20px"></i></a>


                   <div class="btn-group">
                       <button class="btn btn-transparent rounded-0 dropdown-toggle" type="button" data-bs-toggle="collapse" href="#languageSwitcher" role="button" aria-expanded="false" aria-controls="languageSwitcher">

                           @if(session()->get('locale') == 'ar')
                               <i class="fi fi-sa"></i>
                           @elseif(session()->get('locale') == 'fr')
                               <i class="fi fi-fr"></i>
                           @else
                               <i class="fi fi-gb"></i>
                           @endif

                       </button>


                       <div class="collapse position-absolute w-100 start-50 mt-5 translate-middle-x bg-white top-0 text-center" id="languageSwitcher" >
                            <div class="py-2">
                                <div class="@if(session()->get('locale') == 'ar') d-none @endif">
                                    <a href="{{route('change-lang','ar')}}">
                                        <i class="fi fi-sa"></i>
                                    </a>
                                </div>

                                <div class="@if(session()->get('locale') == 'en') d-none @endif">
                                    <a href="{{route('change-lang','en')}}">
                                        <i class="fi fi-gb"></i>
                                    </a>
                                </div>

                                <div class="@if(session()->get('locale') == 'fr') d-none @endif">
                                    <a href="{{route('change-lang','fr')}}">
                                        <i class="fi fi-fr"></i>
                                    </a>
                                </div>
                            </div>
                       </div>


                   </div>

                   @auth

                       <div class="btn-group">
                           <button class="btn btn-transparent rounded-0 dropdown-toggle" type="button" data-bs-toggle="collapse" href="#admin-panel" role="button" aria-expanded="false" aria-controls="languageSwitcher">
                               <i class="fa-solid fa-user"></i>
                           </button>


                           <div class="collapse position-absolute  start-50 mt-5 translate-middle-x bg-white top-0 text-center" id="admin-panel" >
                               <div class="py-2">
                                   <div>
                                       <a href="{{url('admin')}}">
                                           {{__('لوحة التحكم')}}
                                       </a>
                                   </div>

                                   <div>
                                       <form action="{{route('logout')}}" method="POST">
                                           @csrf
                                           <button type="submit" class="btn">تسجيل الخروج</button>
                                       </form>
                                   </div>

                               </div>
                           </div>

                   @endauth
               </ul>



        </div>
    </div>
</nav>

</header>

<!-- End Header -->

<!-- Start OffCanvas -->
<div class="offcanvas side-nav offcanvas-end " data-bs-scroll="true" tabindex="-1" id="sideBar" aria-labelledby="sideBar" style="font-size: 20px;" >
    <div class="offcanvas-header d-flex flex-column align-items-center">
        <button type="button" class="btn-close my-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <h5 class="offcanvas-title text-center mt-2" id="offcanvasWithBothOptionsLabel">{{$settings->display_name()}}</h5>

    </div>
    <div class="offcanvas-body"  style="font-family: 'Cairo' !important;">
        <ul class="navbar-nav mx-auto my-2 my-lg-0 ">
            <li class="nav-item {{request()->is('/') ? "active" : '' }} link-primary pb-2 border-bottom border-primary border-opacity-10">
                <a class="nav-link w-100 fw-bold {{request()->is('/') ? "active" : '' }}" aria-current="page" href="{{url('/')}}">{{__('home.home')}}</a>
            </li>


            <li class="nav-item  py-2 border-bottom border-primary border-opacity-10">
                <span class="d-flex flex-row-reverse align-items-center">
                          <i class="fa-regular fa-chevron-down ms-auto"></i>
                          <a class="nav-link fw-bold w-100" aria-current="page" data-bs-toggle="collapse" data-bs-target="#about" aria-expanded="true" aria-controls="about-us" href="#">{{__('home.about-organization')}}</a>
                </span>
                <div id="about" class="accordion-collapse collapse mt-2" aria-labelledby="about-us">
                    <div class="accordion-body">
                        <ul>
                            <li class="list-group-item ms-3 mb-2"><a href="{{route('who-we-are')}}" class="text-muted">{{__('home.who-we-are')}}</a></li>
                            <li class="list-group-item ms-3 mb-2"><a href="" class="text-muted">{{__('home.our-projects')}}</a></li>
                            <li class="list-group-item ms-3 mb-2"><a href="{{url('who-we-are')}}#beneficiaries" class="text-muted">{{__('home.beneficiaries')}}</a></li>
                            <li class="list-group-item ms-3 mb-2"><a href="{{url('who-we-are')}}#countries" class="text-muted">{{__('home.countries-deal')}}</a></li>
                        </ul>
                    </div>
                </div>
            </li>





            <li class="nav-item  py-2 border-bottom border-primary border-opacity-10">

                <span class="d-flex flex-row-reverse align-items-center">
                                    <i class="fa-regular fa-chevron-down ms-auto"></i>
                                    <a class="nav-link fw-bold w-100" aria-current="page" data-bs-toggle="collapse" data-bs-target="#news" aria-expanded="true" aria-controls="news" href="#">{{__('home.news-and-activities')}}</a>
                </span>

                <div id="news" class="accordion-collapse collapse mt-2" aria-labelledby="news">
                    <div class="accordion-body">
                        <ul>
                            @foreach($navCategories as $category)

                                <li class="list-group-item mb-2 ms-3" ><a href="{{url('category/' . $category -> name())}}" class="text-muted">{{$category->name()}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </li>

            <li class="nav-item  py-2 border-bottom border-primary border-opacity-10">


                <span class="d-flex align-items-center flex-row-reverse">
                     <i class="fa-regular fa-chevron-down ms-auto"></i>
                <a class="nav-link fw-bold w-100" aria-current="page" data-bs-toggle="collapse" data-bs-target="#get-closure" aria-expanded="true" aria-controls="get-closure" href="#">{{__('home.get-closure')}}</a>
                </span>

                <div id="get-closure" class="accordion-collapse collapse mt-2" aria-labelledby="get-closure">
                    <div class="accordion-body">
                        <ul>

                            <li class="list-group-item ms-3 mb-2">
                                <a href="{{url('join-us')}}" class="text-muted">{{__('home.join-us')}}</a>
                            </li>

                            <li class="list-group-item ms-3 mb-2">
                                <a href="{{url('volunteer')}}" class="text-muted">
                                    {{__('home.volunteer')}}
                                </a>
                            </li>

                            <li class="list-group-item ms-3 mb-2">
                                <a href="{{route('donate')}}"  class="text-muted">{{__('home.donate')}}</a>
                            </li>

                            <li class="list-group-item ms-3 mb-2">
                                <a href="{{route('contact')}}" class="text-muted">

                                    {{__('home.contact-us')}}
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>

            <li class="nav-item py-3  @auth   border-bottom border-primary border-opacity-10  @endauth">

                <span class="d-flex flex-row-reverse align-items-center">
                       <i class="fa-regular fa-chevron-down ms-auto"></i>
                <a class="nav-link py-0 w-100" aria-current="page" data-bs-toggle="collapse" data-bs-target="#language" aria-expanded="true" aria-controls="language" href="#">
                    @if(session()->get('locale') == 'ar')
                        <i class="fi fi-sa"></i>
                    @elseif(session()->get('locale') == 'fr')
                        <i class="fi fi-fr"></i>
                    @else
                        <i class="fi fi-gb"></i>
                    @endif
                </a>
                </span>


                <div id="language" class="accordion-collapse collapse" aria-labelledby="language">
                    <div class="accordion-body">
                        <ul>

                            <li class=" @if(session()->get('locale') == 'ar') d-none @endif">
                                <a href="{{route('change-lang','ar')}}">
                                    <i class="fi fi-sa"></i>
                                </a>
                            </li>

                            <li class=" @if(session()->get('locale') == 'en') d-none @endif">

                                <a href="{{route('change-lang','en')}}">
                                    <i class="fi fi-gb"></i>
                                </a>
                            </li>

                            <li class="d-flex align-items-center @if(session()->get('locale') == 'fr') d-none @endif">
                                <a href="{{route('change-lang','fr')}}">
                                    <i class="fi fi-fr"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

            </li>

            @auth

            <li class="nav-item py-2 d-flex flex-row-reverse align-items-center">
                <i class="fa-regular fa-chevron-down ms-auto"></i>
                <a class="nav-link w-100" aria-current="page" data-bs-toggle="collapse" data-bs-target="#admin" aria-expanded="true" aria-controls="admin" href="#">
                    <i class="fa-solid fa-user"></i>
                </a>
            </li>


            <div id="admin" class="accordion-collapse collapse" aria-labelledby="admin">
                <div class="accordion-body">
                    <ul >

                        <li class="ms-3">
                            <a href="{{url('admin')}}" class="text-muted">
                                {{__('لوحة التحكم')}}
                            </a>
                        </li>

                        <li  class="ms-3">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="bg-transparent border-0 text-muted" style="font-size: 20px">خروج</button>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>

            @endauth

        </ul>

        <img src="{{asset('assets/imgs/lines.svg')}}" class="pt-5 mt-5"/>
        <div class="d-flex align-items-center justify-content-center my-3">
            <a href="https://www.facebook.com/MEDIA.EOIC/" target="_blank" class="me-3" style="color: #4267B2"><i class="fa-brands fa-facebook fa-1x"></i></a>
            <a href="https://www.instagram.com/eoic_geneva/" target="_blank" class="me-3" style="color: #C13584"><i class="fa-brands fa-instagram fa-1x"></i></a>
            <a href="https://www.youtube.com/channel/UCi_iTZfHrRN19Wtwo4vM4EA?view_as=subscriber" target="_blank" class="me-3" style="color: #FF0000"><i class="fa-brands fa-youtube fa-1x"></i></a>

            <a href="https://twitter.com/EOIC_Geneva" target="_blank" class="me-3" style="color: #1DA1F2"><i class="fa-brands fa-twitter f-1x"></i></a>
        </div>

    </div>
</div>

<!-- End OffCanvas -->


<!-- Start Content -->

@yield('content')

<!-- End Content -->

<!-- Start Footer -->
    <footer id="footer" class="bg-primary text-lg-start text-center border-top border-3 border-secondary " style="background-image: url('{{asset('assets/imgs/bg-footer.svg')}}')">
        <div class="container">
            <div class="row align-items-lg-baseline align-items-lg-center   justify-content-lg-between justify-content-center">
                <div class="col-lg-4">
                    <div class="footer-widget">
                        <div class="name">
                            <h3 class=" text-light ps-3 border-secondary border-0">{{$settings -> display_name()}}</h3>
                        </div>

                        {!! $settings->description() !!}
                    </div>


                </div>


                <div class="col-md-2">
                    <div>
                        <h3 class="mb-2 mb-lg-5 border-none border-lg-start  border-5 text-light ps-3 border-secondary">{{__('home.shortcuts')}}</h3>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{route('who-we-are')}}" class="nav-link"><i class="fa-light fa-users  me-1"></i> {{__('home.who-we-are')}} </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link"><i class="fa-light fa-scroll me-1"></i> {{__('home.magazines')}}</a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link"><i class="fa-light fa-credit-card-blank  me-1"></i> {{__('home.cards')}}</a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link"><i class="fa-light fa-message  me-1"></i> {{__('home.contact-us')}}</a>
                            </li>



                        </ul>
                    </div>


                </div>

                <div class="col-lg-3">
                    <div class="footer-widget mb-2 mt-lg-0 mt-2">
                        <h3 class="mb-2 mb-lg-5 border-none border-lg-start  border-5 text-light ps-3 border-secondary">{{__('home.contact-us')}}</h3>
                        <div class="contact">
                            <div class="py-2 mb-0">
                                <i class="fa-light fa-phone me-2"></i>
                                <span>{{$settings -> phone}}</span>
                            </div>

                            <div class="py-2 mb-0">
                                <i class="fa-light fa-envelope me-2"></i>
                                <span>{{$settings -> email}}</span>
                            </div>

                            <div class="py-2 mb-0 d-flex justify-content-center">
                                <i class="fa-light fa-location-dot me-2 h-100"></i>
                                <p class="text-start mb-0">{{$settings -> address}}</p>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-3  col-lg-2  align-self-center mx-auto mx-md-0 mb-3 mb-md-0">

                    <a href="{{route('login')}}" ><img src="{{asset('assets/imgs/logo.svg')}}" alt=""   class="pe-none"></a>

                </div>

                    <p class="mb-0 mt-2 mt-lg-0 text-center"> {{   __('كل الحقوق محفوظة') .' ' . date('Y')}} &copy; {{$settings -> display_name()}}</p>

            </div>


        </div>
    </footer>

<!-- End Footer  -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/fontawesome/js/all.min.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>

@livewireScripts

<script type="text/javascript">

    jQuery('button').click( function(e) {
        jQuery('.collapse').collapse('hide');
    });

</script>

@yield('script')

</body>

</html>
