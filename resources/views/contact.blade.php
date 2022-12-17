@extends('blog-layout.app')
@section('title',__('home.contact-us'))

@section('content')




    <div class="container my-5">
        <h1 class="display-4 text-center  border-0 text-primary">{{__('home.contact-us')}}</h1>
        <livewire:contact/>
    </div>

@endsection
