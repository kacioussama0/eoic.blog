@extends('admin.layouts.app')
@section('title','تعديل مقال')



@section('content')

    @if($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach

            </ul>

        </div>


    @endif

    @include('admin.layouts.success')

    <form action="{{route('posts.update',$post)}}" method="POST" enctype="multipart/form-data">


        @method('PATCH')


        @csrf

        <div class="form-group">
            <label for="title" class="form-label">العنوان</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="أدخل عنوان المقال" value="{{$post->title}}">
        </div>


        <div class="form-group">
            <label for="category" class="form-label">التصنيفات</label>
            <select name="category" id="category" class="form-select">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($post->category_id == $category->id) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <label for="tags" class="form-label">الوسوم</label>

        <div class="form-group">
            @foreach($tags as $tag)
                <label for="tags">#{{$tag->name}}</label>
                <input type="checkbox" @foreach($post -> tags as $ta) @if($ta->id == $tag->id) checked @endif @endforeach  name="tags[]" id="tags" value="{{$tag->id}}">
            @endforeach
        </div>




        <div class="form-group">
            <label for="image" class="form-label">صورة المقال</label>
            <input type="file" name="image" id="image" class="form-control"/>
        </div>


        <img src="{{!File::exists($post->image) ? asset('storage/' . $post->image) : asset('imgs/logo.svg') }}" alt="" style="width: 150px ; height: 150px ; object-fit: cover ; border-radius: 5Px">


        <x-admin.forms.text-area name="content" title="محتوى المقال"  value="{!! $post->content !!}"/>





        <div class="form-check form-switch mb-3">
            <label for="is_published">المقال منشور</label>
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" @if($post->is_published == 'on') checked @endif>
        </div>


        <button class="btn btn-primary w-100">تعديل المقال</button>
    </form>

    <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>
    <script>ClassicEditor
            .create( document.querySelector( '#content' ), {

                licenseKey: '',



            } )
            .then( editor => {
                window.editor = editor;




            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: b12ctwt0k9ey-kst4g2i2xiii' );
                console.error( error );
            } );
    </script>




@endsection
