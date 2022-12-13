@extends('blog-layout.app')
@section('title',__('home.join-us'))

@section('content')




    <div class="container my-5">
        <h1 class="text-center ">{{__('home.join-us')}}</h1>
        <livewire:join-us/>
    </div>

@endsection
