@extends('admin.layouts.app')
@section('title','إضافة مقال')



@section('content')


    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><span class="fi fi-sa"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><span class="fi fi-us"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><span class="fi fi-fr"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" class="mt-3">

                        @csrf
                        <x-admin.forms.input name="title" title="العنوان" type="text" value="{{old('title')}}"/>

                        <div class="form-group">
                            <label for="category" class="form-label">التصنيفات</label>
                            <select name="category" id="category" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="tags" class="form-label">الوسوم</label>

                        <div class="form-group">
                            <div class="row">

                                @foreach($tags as $tag)
                                    <div class="col-md-3 mb-3">
                                        <label for="{{$tag->name}}">#{{$tag->name}}</label>
                                        <input type="checkbox" name="tags[]" id="{{$tag->name}}" value="{{$tag->id}}">
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <x-admin.forms.input name="image" title="صورة المقال" type="file" value="{{old('image')}}"/>
                        <x-admin.forms.text-area name="content" title="محتوى المقال"  value="{{old('content')}}"/>

                        <div class="form-check form-switch mb-3">
                            <label for="is_published">المقال منشور</label>
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="on">
                        </div>


                        <button class="btn btn-primary w-100">إضافة المقال</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
            </div>
        </div>
    </div>


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
