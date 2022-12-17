@extends('blog-layout.app')
@section('title','المجلات')
@section('content')



    <div class="page-header ">

        <div class="page-header-bg" style="background-image: url('{{asset('assets/imgs/books.svg')}}')" data-stellar-background-ratio="0.9"></div>
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-md-offset-1 col-md-10 text-center">

                    <h1 class="text-uppercase">{{__('المجلات')}}</h1>

                    <div class="position-relative ">


                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">

       <div class="container">
           <div class="row g-3">
               @foreach($magazines as $magazine)

                   @if($magazine->title() != null)

                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <div class="card border-primary"  style="height: 550px">
                           <img src="{{asset('storage/' . $magazine -> thumbnail())}}" class="card-img-top object-fit-cover  h-75" alt="...">
                           <div class="card-body h-25 d-flex justify-content-center align-items-center">
                               <h5 class="card-title text-center ">{{$magazine -> title()}}</h5>
                           </div>

                           <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center h-25">

                               <a href="" class="_df_button text-bg-primary" source="{{asset('storage/' . $magazine->book())}}">
                                   {{__('تصفح')}}
                                   <i class="fa-light fa-eye ms-1" ></i>
                               </a>

                               <a href="{{asset('storage/' . $magazine->book())}}" download>
                                   {{__('تحميل')}}
                                   <i class="fa-light fa-download ms-1"></i>
                               </a>


                           </div>
                       </div>
                   </div>

                @endif
               @endforeach

           </div>
       </div>

    </section>



@endsection
