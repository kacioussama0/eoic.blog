@php
$navCategories = \App\Models\Category::all()->take(5);
$settings = \App\Models\Setting::first();
@endphp
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.css" />

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


<div class="modal fade" id="search" tabindex="-1" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h1 class="modal-title fs-5 text-white" id="search">{{__('home.search')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('search')}}" method="GET" class="d-flex" role="search">

                    <input class="form-control me-2" name="result" type="search" placeholder="" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">{{__('home.search')}}</button>
                </form>
            </div>

        </div>
    </div>
</div>

<header class="position-sticky top-0  bg-white" style="z-index: 999">

<nav class="navbar navbar-expand-lg shadow-sm align-items-center" >

    <div class="container">

        <a data-bs-toggle="modal" class="d-lg-none" href="#search" role="button">
            <i class="fa-regular fa-magnifying-glass" style="font-size: 22px"></i>
        </a>

        <a href="{{url('/')}}">
            <img src="{{asset('assets/imgs/logo.svg')}}"  alt="Logo" class = "main-logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar" aria-controls="sideBar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-light fa-bars text-primary" style="font-size: 22px"></i>
        </button>

        <div class="collapse navbar-nav navbar-collapse navbarScroll " id="megaGroup">

            <ul class="navbar-nav mx-auto my-2 my-lg-0 ">
                <li class="nav-item {{request()->is('/') ? "active" : '' }}">
                    <a class="nav-link {{request()->is('/') ? "active" : '' }}" aria-current="page" href="{{url('/')}}">{{__('home.home')}}</a>
                </li>

                <li class="nav-item dropdown" data-parent="#megaGroup">
                    <a class="nav-link  dropdown-toggle" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#about"  aria-expanded="false" aria-controls="about" href="#about" role="button" aria-expanded="false" aria-controls="about">
                        {{__('home.organization')}}
                    </a>

                </li>

                <div class="collapse mega-menu" id="about" >
                    <div class="container p-5">
                        <div class="row justify-between">

                            <div class="col-5">
                                <h3 class="title-yellow">{{__('home.about-organization')}}</h3>
                                <ul>
                                    <li class=""><a href="{{route('who-we-are')}}">{{__('home.who-we-are')}}</a></li>
                                    <li><a href="">{{__('home.our-projects')}}</a></li>
                                    <li><a href="{{url('who-we-are')}}#beneficiaries">{{__('home.beneficiaries')}}</a></li>
                                    <li><a href="{{url('who-we-are')}}#countries">{{__('home.countries-deal')}}</a></li>
                                </ul>
                            </div>



                            <div class="col-5 offset-1">
                                <h3 class="title-yellow">{{__('home.news-and-activities')}}</h3>
                                <ul>
                                    @foreach($navCategories as $category)

                                        <li><a href="{{url('category/' . $category -> name())}}">{{$category->name()}}</a></li>
                                    @endforeach

                                </ul>
                            </div>



                        </div>
                    </div>
                </div>

                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-toggle="collapse"  data-bs-target="#join" aria-expanded="false" aria-controls="join" href="#join" role="button" aria-expanded="false" aria-controls="join">
                        {{__('home.get-closure')}}
                    </a>

                </li>




                <div class="collapse mega-menu" id="join" >
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
                                <a href="" class="text-white">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="media" href="#media" role="button" aria-expanded="false" aria-controls="media">
                        {{__('home.media')}}
                    </a>

                </li>

                <div class="collapse mega-menu" id="media" data-parent="#megaGroup">
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

                        </div>
                    </div>
                </div>

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

<div class="offcanvas offcanvas-end bg-primary text-white " data-bs-scroll="true" tabindex="-1" id="sideBar" aria-labelledby="sideBar" style="background-image: url('{{asset('assets/imgs/bg-footer.svg')}}');background-blend-mode: soft-light;font-size: 22px" >
    <div class="offcanvas-header">
        <h5 class="offcanvas-title text-white" id="offcanvasWithBothOptionsLabel">{{$settings->display_name()}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav mx-auto my-2 my-lg-0">
            <li class="nav-item {{request()->is('/') ? "active" : '' }}">
                <a class="nav-link {{request()->is('/') ? "active" : '' }}" aria-current="page" href="{{url('/')}}">@lang('home.Home')</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('الأخبار والنشاطات')}}
                </a>
                <ul class="dropdown-menu">

                    @foreach($navCategories as $category)

                        <li><a class="dropdown-item" href="{{url('category/' . $category -> name())}}">{{$category->name()}}</a></li>
                    @endforeach

                </ul>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('الهيئة')}}
                </a>
                <ul class="dropdown-menu">

                    <li class=""><a href="{{route('who-we-are')}}" class="dropdown-item">{{__('home.who-we-are')}}</a></li>
                    <li><a href="" class="dropdown-item">{{__('home.our-projects')}}</a></li>
                    <li><a href="{{url('who-we-are')}}#beneficiaries" class="dropdown-item">{{__('home.beneficiaries')}}</a></li>
                    <li><a href="{{url('who-we-are')}}#countries" class="dropdown-item">{{__('home.countries-deal')}}</a></li>

                </ul>
            </li>




            <li class="nav-item">
                <a class="nav-link">{{__('إقترب إلينا')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">{{__('وسائط الإعلام')}}</a>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(session()->get('locale') == 'ar')
                        <i class="fi fi-sa"></i>
                    @elseif(session()->get('locale') == 'fr')
                        <i class="fi fi-fr"></i>
                    @else
                        <i class="fi fi-gb"></i>
                    @endif
                </a>
                <ul class="dropdown-menu">

                    <li class="dropdown-item @if(session()->get('locale') == 'ar') d-none @endif"><a href="{{route('change-lang','ar')}}" class="dropdown-item"><i class="fi fi-sa"></i></a></li>
                    <li class="dropdown-item @if(session()->get('locale') == 'fr') d-none @endif"><a href="{{route('change-lang','fr')}}" class="dropdown-item"><i class="fi fi-fr"></i></a></li>
                    <li class="dropdown-item @if(session()->get('locale') == 'en') d-none @endif"><a href="{{route('change-lang','en')}}" class="dropdown-item"><i class="fi fi-gb"></i></a></li>


                </ul>



            </li>




        </ul>




    </div>
</div>

@yield('content')


    <!-- Start Footer -->
    <footer id="footer" class="bg-primary border-top border-3 border-secondary " style="background-image: url('{{asset('assets/imgs/bg-footer.svg')}}')">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row  text-center text-md-start justify-content-between">
                <div class="col-md-4">
                    <div class="footer-widget">
                        <div class="name">
                            <h3>{{$settings -> display_name()}}</h3>
                        </div>
                        {!! $settings->description() !!}
                    </div>
                </div>


                <div class="col-md-3">
                    <div >
                        <h3 class="mb-2 mb-md-5">{{__('home.shortcuts')}}</h3>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{route('contact')}}" class="nav-link"><i class="fa-light fa-users"></i> {{__('home.who-we-are')}} </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link"><i class="fa-light fa-scroll"></i> {{__('home.magazines')}}</a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link"><i class="fa-light fa-credit-card-blank"></i> {{__('home.cards')}}</a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link"><i class="fa-light fa-message"></i> {{__('home.contact-us')}}</a>
                            </li>



                        </ul>
                    </div>


                </div>

                <div class="col-md-3">
                    <div class="footer-widget">
                        <h3 class="mb-2 mb-md-5">{{__('home.contact-us')}}</h3>
                        <div class="contact">
                            <div class="py-2 mb-0">
                                <i class="fa-light fa-phone me-2"></i>
                                <span>{{$settings -> phone}}</span>
                            </div>

                            <div class="py-2 mb-0">
                                <i class="fa-light fa-envelope me-2"></i>
                                <span>{{$settings -> email}}</span>
                            </div>

                            <div class="py-2 mb-0">
                                <i class="fa-light fa-location-dot me-2"></i>
                                <span>{{$settings -> address}}</span>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-2  align-self-center mx-auto mx-md-0 mb-3 mb-md-0">

                    <a href="{{route('login')}}" ><img src="{{asset('assets/imgs/logo.svg')}}" alt=""   class="pe-none"></a>

                </div>

            </div>

            <div class=" text-center">
                    <p class="mb-0 mt-3"> {{   __('كل الحقوق محفوظة') .' ' . date('Y')}} &copy; {{$settings -> display_name()}}</p>

                </div>
        </div>
    </footer>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v15.0&appId=3303718453247757&autoLogAppEvents=1" nonce="xcMhs8T4"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
<script src="{{asset('assets/fontawesome/js/all.min.js')}}"></script>
<script src="{{asset('assets/dflip/assets/js/dflip.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.js"></script>
<script src="{{asset('assets/dflip/assets/js/metaboxes.min.js')}}"></script>

@livewireScripts

<script type="text/javascript">

    jQuery('button').click( function(e) {
        jQuery('.collapse').collapse('hide');
    });

</script>


</body>

</html>
