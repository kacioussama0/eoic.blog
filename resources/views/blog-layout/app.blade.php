<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="مرصد اليقظة لحقوق الإنسان والقضايا العادلة">
    <meta name="description" content="مرصد اليقظة لحقوق الإنسان والقضايا العادلة منظمة جاءت قصد العمل على ترقية وتعزيز حقوق الإنسان وطنيا ودولياً ">
    <meta name="keywords" content="حقوق الإنسان , القضايا العادلة , فلسطين , الصحراء الغربية">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Arabic">
    <title>{{config('app.name')}} | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.rtl.css')}}">
    <link rel='icon' href='{{asset('assets/imgs/logo.svg')}}'>
    <link rel="stylesheet" href="{{asset('assets/css/uikit-rtl.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/blog.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/blog_style.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>
        $(window).on('load',function(){
            $('.loader-container').fadeOut();
        });
    </script>

</head>
<x-loader/>


<body>

<header class="position-relative">

<nav class="navbar navbar-expand-lg shadow-sm ">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('assets/imgs/logo.svg')}}" alt="" class="main-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarScroll">

            <ul class="navbar-nav mx-auto my-2 my-lg-0 ">
                <li class="nav-item {{request()->is('/') ? "active" : '' }}">
                    <a class="nav-link {{request()->is('/') ? "active" : '' }}" aria-current="page" href="{{url('/')}}">{{__('الرئيسية')}}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#about" aria-expanded="false" aria-controls="about" href="#about" role="button" aria-expanded="false" aria-controls="about">
                        {{__('الهيئة')}}
                    </a>
                    <div class="collapse mega-menu p-5 ms-5 " id="about">
                        <div class="container">
                        <div class="row g-5">

                            <div class="col-3 ">
                                <h3 class="title-yellow">{{__('عن الهيئة')}}</h3>
                                <ul>
                                    <li>{{__('من نحن')}}</li>
                                    <li>{{__('مشاريعنا')}}</li>
                                    <li>{{__('الجهات المستفادة')}}</li>
                                    <li>{{__('الدول التي نعمل بها')}}</li>
                                    <li>{{__('الهيئة في أعين الإعلام')}}</li>
                                </ul>
                            </div>



                            <div class="col-4 offset-1">
                                <h3 class="title-yellow">{{__('الأخبار والنشاطات')}}</h3>
                                <ul>
                                    <li>{{__('نشاطات الهيئة')}}</li>
                                    <li>{{__('بيانات الهيئة')}}</li>
                                    <li>{{__('إتفاقيات')}}</li>
                                    <li>{{__('المؤتمر')}}</li>
                                </ul>
                            </div>

                            <div class="col-3 offset-1">
                                <h3 class="title-yellow">{{__('الإصدارات')}}</h3>

                                <ul>
                                    <li>{{__('مجلة لتعارفوا')}}</li>
                                    <li>{{__('مقالات')}}</li>
                                    <li>{{__('حوارات')}}</li>
                                    <li>{{__('الفتاوي')}}</li>

                                </ul>
                            </div>

                        </div>
                        </div>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#join" aria-expanded="false" aria-controls="join" href="#join" role="button" aria-expanded="false" aria-controls="join">
                        {{__('إقترب إلينا')}}
                    </a>
                    <div class="collapse mega-menu p-5 ms-5 " id="join">
                        <div class="container">

                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        {{__('وسائط الإعلام')}}
                    </a>
                    <div class="collapse mega-menu p-5 ms-5 " id="collapseExample">
                        <div class="container">

                        </div>
                    </div>
                </li>

            </ul>
               <ul class="navbar-nav">
                   <li class="nav-item">
                       <a class="nav-link disabled" href="#">{{__('دخول')}}</a>
                   </li>
               </ul>
        </div>
    </div>
</nav>

</header>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav mx-auto my-2 my-lg-0">
            <li class="nav-item {{request()->is('/') ? "active" : '' }}">
                <a class="nav-link {{request()->is('/') ? "active" : '' }}" aria-current="page" href="{{url('/')}}">{{__('الرئيسية')}}</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('الهيئة')}}
                </a>
                <ul class="dropdown-menu ">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link">{{__('إقترب إلينا')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">{{__('وسائط الإعلام')}}</a>
            </li>
        </ul>
    </div>
</div>

@yield('content')


    <!-- FOOTER -->
    <footer id="footer" style="background-image: url('{{asset('assets/imgs/continent.svg')}}')">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row text-center text-md-start">
                <div class="col-md-4">
                    <div class="footer-widget">
                        <div class="name">
                            <h3 class="text-light">{{$settings -> blog_name}}</h3>
                        </div>
                        <p>@php echo $settings->blog_description @endphp</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h3 class="mb-5">تابعونا على</h3>
                        <div class="social-media">
                            <div>
                                <i class="bi bi-facebook"></i>
                                <a href="https://facebook.com/marsad.elyakada">marsad.elyakada</a>
                            </div>

                            <div>
                                <i class="bi bi-instagram"></i>
                                <a href="https://instagram.com/marsad.elyakada">marsad.elyakada</a>
                            </div>

                            <div>
                                <i class="bi bi-twitter"></i>
                                <a href="https://twitter.com/marsad_elyakada">marsad_elyakada</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer-widget">
                        <h3 class=" mb-5">تواصلو معنا</h3>
                       <div class="contact">
                           <div>
                               <i class="bi bi-telephone-fill"></i>
                               <span>{{$settings -> phone}}</span>
                           </div>

                           <div>
                               <i class="bi bi-envelope-fill"></i>
                               <span>{{$settings -> email}}</span>
                           </div>


                       </div>
                    </div>
                </div>



                <div class="col-4 col-md-2  align-self-center mx-auto mx-md-0 mb-3 mb-md-0">

                    <a href="{{route('login')}}" ><img src="{{asset('assets/imgs/logo.svg')}}" alt=""   class="pe-none"></a>

                </div>

            </div>

            <div class=" text-center">
                    <p class="mb-0"> كل الحقوق محفوظة &copy; {{$settings -> blog_name}}</p>

                </div>
        </div>
    </footer>

    <script src="{{asset('assets/js/uikit.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
