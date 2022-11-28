@extends('blog-layout.app')
@section('title','من نحن')



@section('content')

    <div class="container py-5">

        <h3 class="title mb-5">من نحن</h3>

        <div class="uk-card-default p-5 shadow">
            <div class="uk-card-title">
                <h1 class="display-5 text-center">{{$settings -> blog_name}}</h1>
            </div>
            <div class="uk-card-body text-center"  style="font-size: 22px !important;">
                {!! $settings->blog_description !!}
            </div>
        </div>

        <h3 class="title my-5">هيكلة المرصد</h3>


        <div class="row g-5">


        @foreach ($users as $user)

            <div class="col-md-3 wow rotateInUpRight">
                <div class="uk-card uk-card-default mb-3" style=" height: 250px ; box-shadow: 10px -10px 0 #0a58ca ">
                    <div class="uk-card-badge  uk-label">{{$user -> occupation}}</div>
                    <img src="{{asset('storage/' . $user -> image)}}" alt="" class="img-fluid h-100 w-100 uk-object-cover uk-object-top">
                </div>

                <div class="uk-card-body border border-secondary text-center" style="margin-top: -40px ; box-shadow: 10px 10px 0 #F9A11B ">
                    <h3 class="uk-card-title text-center">{{$user -> full_name}}</h3>
                    <p class="text-center uk-label uk-label-warning mx-auto">{{$user -> profession}}</p>
                    <p class=" ">{{$user -> age}} سنة </p>
                </div>

            </div>

        @endforeach
        </div>
    </div>
@endsection
