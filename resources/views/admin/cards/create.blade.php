@extends('admin.layouts.app')
@section('title',__('forms.add-card'))



@section('content')

    <form action="{{route('cards.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <x-admin.forms.input name="image" title="{{__('forms.card-in-ar')}}" type="file" value="{{old('image')}}"/>
        <x-admin.forms.input name="image_fr" title="{{__('forms.card-in-fr')}}" type="file" value="{{old('image_fr')}}"/>
        <x-admin.forms.input name="image_en" title="{{__('forms.card-in-en')}}" type="file" value="{{old('image_en')}}"/>

        <div class="form-check form-switch mb-3">
            <label for="is_published">{{__('forms.share')}}</label>
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1">
        </div>

        <button class="btn btn-primary w-100">{{__('forms.add-card')}}</button>

    </form>



@endsection
