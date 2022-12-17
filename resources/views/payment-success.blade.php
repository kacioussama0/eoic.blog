@extends('blog-layout.app')
@section('title','تبرع للهيئة')




@section('content')

    <div class="container text-center py-5 ">
        <img src="{{asset('assets/imgs/donate.svg')}}" alt="" style="max-width: 200px" class="mb-3" >
        <h3 class="display-2 py-3 mb-3">{{__('بارك الله فيك تم التبرع')}}</h3>
        <a class="btn btn-outline-primary border-0 btn-lg" href="{{url('/')}}">{{__('الرجوع للرئيسة')}}</a>


    </div>

@endsection
