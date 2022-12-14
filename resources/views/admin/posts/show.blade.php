@extends('admin.layouts.app')
@section('title',__('forms.articles-showcase'))




@section('content')


    <h4 class="badge rounded bg-primary p-2" style="font-size: 22px"> {{$post->category->name}}</h4>

    <div>
        <img src="{{!File::exists($post->image) ? asset('storage/' . $post->image) : asset('imgs/logo.svg') }}" alt="" class="mb-3 uk-height-small" style="width: 100% ; height: 100%">
    </div>

    <span class="date">{{date_format($post->created_at,'Y-m-d')}}</span>
    <h3 class="uk-text-bold mt-2">{{$post -> title}}</h3>
    <div style="overflow: hidden ;white-space: wrap; text-overflow: ellipsis" class="uk-height-small">
        {!! $post->content !!}
    </div>


@endsection
