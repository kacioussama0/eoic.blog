@extends('admin.layouts.app')
@section('title','تعديل بطاقة')



@section('content')

    <form action="{{route('cards.update',$card)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PATCH')
        <x-admin.forms.input name="image" title="البطاقة بالعربية" type="file" value="{{old('image')}}"/>
        <img src="{{asset('storage/' . $card -> image)}}" style="width:150px"/>
        <x-admin.forms.input name="image_fr" title="البطاقة بالفرنسية" type="file" value="{{old('image_fr')}}"/>

        @if($card -> image_fr != null)
            <img src="{{asset('storage/' . $card -> image_fr)}}" style="width:150px"/>
        @endif

        <x-admin.forms.input name="image_en" title="البطاقة بالإنجليزية" type="file" value="{{old('image_en')}}"/>

        @if($card -> image_en != null)
            <img src="{{asset('storage/' . $card -> image_en)}}" style="width:150px"/>
        @endif

        <div class="form-check form-switch mb-3">
            <label for="is_published">البطاقة منشورة</label>
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" @if($card -> is_published) checked @endif>
        </div>

        <button class="btn btn-primary w-100">تعديل البطاقة</button>

    </form>



@endsection
