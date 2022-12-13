@extends('blog-layout.app')
@section('title',__('home.contact-us'))

@section('content')




    <div class="container my-5">
        <h1 class="text-center ">{{__('home.contact-us')}}</h1>
        <livewire:contact/>
    </div>

@endsection
