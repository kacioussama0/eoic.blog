@php
    $settings = \App\Models\Setting::first()
@endphp
@extends('blog-layout.app')
@section('title',__('forms.something-wrong'))



@section('content')

    <div class="container text-center py-5 ">
        <i class="fa-light fa-shield-exclamation fa-10x mb-5 text-danger"></i>
        <h3 class="display-1 py-3 mb-5">{{__('forms.something-wrong')}}</h3>
        <a class="btn btn-outline-primary border-0 btn-lg" href="{{url('/')}}">{{__('forms.back-to-home')}}</a>
    </div>
@endsection
