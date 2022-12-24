@extends('admin.layouts.app')
@section('title',__('forms.edit-video'))



@section('content')

    <form action="{{route('videos.update',$video)}}" method="POST">

        @csrf
        @method('PATCH')
        <x-admin.forms.input name="title" title="{{__('forms.title')}}" type="text" value="{{$video -> title}}"/>
        <x-admin.forms.input name="url" title="{{__('forms.link')}}" type="text" value="{{$video -> url}}"/>

        <div class="form-check form-switch mb-3">
            <label for="is_published">{{__('forms.share')}}</label>
            <input class="form-check-input" @if($video -> is_published) checked @endif type="checkbox" name="is_published" id="is_published" value="1">
        </div>



        <button class="btn btn-primary w-100">{{__('forms.edit-video')}}</button>

    </form>



@endsection
