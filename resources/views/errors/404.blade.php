@php
    $settings = \App\Models\Setting::first()
@endphp
@extends('blog-layout.app')
@section('title',__('forms.not-found'))



@section('content')

    <div class="container text-center py-5 ">
        <img src="{{asset('assets/imgs/zellig.svg')}}" alt="" style="max-width: 200px" class="mb-3" >
        <h3 class="display-2 py-3 mb-3">{{__('forms.not-found')}}</h3>
        <a class="btn btn-outline-primary border-0 btn-lg" href="{{url('/')}}">{{__('forms.back-to-home')}}</a>


    </div>
@endsection
