@extends('blog-layout.app')
@section('title',__('home.volunteer'))

@section('content')




    <div class="container my-5">
        <h1 class="text-center ">{{__('home.volunteer')}}</h1>
        <livewire:volunteer/>
    </div>

@endsection
