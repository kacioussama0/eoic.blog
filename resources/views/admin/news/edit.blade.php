@extends('admin.layouts.app')
@section('title',__('forms.add-news'))



@section('content')

    <form action="{{route('news.update',$news)}}" method="POST">

        @csrf
        @method('PATCH')
        <x-admin.forms.input name="title" title="{{__('forms.title-in-ar')}}" type="text" value="{{$news -> title}}"/>
        <x-admin.forms.input name="title_en" title="{{__('forms.title-in-en')}}" type="text" value="{{$news -> title_en}}"/>
        <x-admin.forms.input name="title_fr" title="{{__('forms.title-in-fr')}}" type="text" value="{{$news -> title_fr}}"/>

        <div class="form-check form-switch mb-3">
            <label for="is_published">{{__('forms.share')}}</label>
            <input class="form-check-input" type="checkbox" @if($news -> is_published) checked @endif name="is_published" id="is_published" value="1">
        </div>



        <button class="btn btn-primary w-100">{{__('forms.edit')}}</button>

    </form>



@endsection
