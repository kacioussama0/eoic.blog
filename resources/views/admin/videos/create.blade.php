@extends('admin.layouts.app')
@section('title',__('forms.add-videos'))



@section('content')

    <form action="{{route('videos.store')}}" method="POST">

            @csrf

        <x-admin.forms.input name="title" title="{{__('forms.title')}}" type="text" value="{{old('title')}}"/>
        <x-admin.forms.input name="url" title="{{__('forms.link')}}" type="text" value="{{old('url')}}"/>

        <div class="form-check form-switch mb-3">
            <label for="is_published">{{__('forms.share')}}</label>
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1">
        </div>



        <button class="btn btn-primary w-100">{{__('forms.add-videos')}}</button>

    </form>



@endsection
