@php
    $settings = \App\Models\Setting::first()
@endphp
@extends('blog-layout.app')
@section('title','الموقع قيد الصيانة')

@section('style')

    <style>

        header,#footer {
            display: none;
        }



    </style>

@endsection

@section('content')

    <div class="position-absolute top-50 start-50 translate-middle w-100 text-center ">
        <img src="{{asset('assets/imgs/logo.svg')}}" alt="" style="max-width: 200px" class="mb-3" >
        <h3 class="display-2 py-3 mb-3">{{__('الموقع قيد الصيانة')}}</h3>


    </div>
@endsection
