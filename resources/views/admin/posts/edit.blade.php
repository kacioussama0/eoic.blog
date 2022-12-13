@extends('admin.layouts.app')
@section('title','تعديل مقال')



@section('content')


    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="arabic-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><span class="fi fi-sa"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="english-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><span class="fi fi-us"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="frensh-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><span class="fi fi-fr"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                </li>
            </ul>
            <form action="{{route('posts.update',$post)}}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                @method('PUT')
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">


                        <x-admin.forms.input name="title" title="العنوان" type="text" value="{{$post -> title}}"/>

                        <div class="form-group">
                            <label for="category" class="form-label">التصنيفات</label>
                            <select name="category" id="category" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($post -> category -> id == $category ->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="tags" class="form-label">الوسوم</label>

                        <div class="form-group">
                            <div class="row">

                                @foreach($tags as $tag)
                                    <div class="col-md-3 mb-3">
                                        <label for="{{$tag->name}}">#{{$tag->name}}</label>
                                        <input type="checkbox" name="tags[]" id="{{$tag->name}}" value="{{$tag->id}}"

                                               @foreach($post -> tags -> toArray() as $tagPost)

                                                    @if($tagPost['name'] == $tag['name'] )
                                                        checked
                                                        @break
                                                    @endif
                                               @endforeach
                                        >
                                    </div>
                                @endforeach
                            </div>


                        </div>

                        <x-admin.forms.input name="image" title="صورة المقال" type="file" value="{{$post -> image}}"/>

                        <img src="{{ asset('storage/' . $post->image) }}" alt="" class="rounded" style="width: 250px">

                        <x-admin.forms.text-area name="content" id="#content" class="content" title="محتوى المقال"  value="{!!$post -> content!!}"/>

                        <div class="form-check form-switch mb-3">
                            <label for="is_published">المقال منشور</label>
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="on" @if($post -> is_published) checked @endif>
                        </div>


                    </div>



                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <x-admin.forms.input name="title_en" title="العنوان" type="text" value="{{$post -> title_en }}"/>
                        <x-admin.forms.input name="image_en" title="صورة المقال" type="file" value="{{old('image_en')}}"/>
                        <img src="{{!File::exists(public_path($post->image_en)) ? asset('storage/' . $post->image_en) : asset('storage/' . $post->image) }}" alt="" class="rounded" style="width: 250px">

                        <x-admin.forms.text-area name="content_en" id="content_1" title="محتوى المقال"  value="{!! $post -> content_en !!}"/>

                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <x-admin.forms.input name="title_fr" title="العنوان" type="text" value="{{$post -> title_fr }}"/>
                        <x-admin.forms.input name="image_fr" title="صورة المقال" type="file" value="{{old('image_fr')}}"/>
                        <img src="{{!File::exists(public_path($post->image_fr)) ? asset('storage/' . $post->image_fr) : asset('storage/' . $post->image) }}" alt="" class="rounded" style="width: 250px">

                        <x-admin.forms.text-area name="content_fr" id="content_2" title="محتوى المقال"  value="{!!$post -> content_fr !!}"/>


                    </div>

                </div>
                <button type="submit" class="btn btn-primary w-100">{{__('تعديل  مقال')}}</button>
            </form>

        </div>
    </div>


    <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>


    <script>ClassicEditor
            .create( document.querySelector( '#content' ), {

                licenseKey: '',

                ckfinder: {
                    uploadUrl: "{{route('posts.uploadImage') . '?_token=' . csrf_token()}}"
                }

            } )
            .then( editor => {
                window.editor = editor;




            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: qiybqic1scos-2mtgwv7b85hg' );
                console.error( error );
            } );
    </script>

    <script>ClassicEditor
            .create( document.querySelector( '#content_en' ), {

                licenseKey: '',
                language: 'en',

                ckfinder: {
                    uploadUrl: "{{route('posts.uploadImage') . '?_token=' . csrf_token()}}"
                }

            } )
            .then( editor => {
                window.editor = editor;




            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: qiybqic1scos-2mtgwv7b85hg' );
                console.error( error );
            } );
    </script>


    <script>ClassicEditor
            .create( document.querySelector( '#content_fr' ), {

                licenseKey: '',
                language: 'fr',
                ui: 'en',

                ckfinder: {
                    uploadUrl: "{{route('posts.uploadImage') . '?_token=' . csrf_token()}}"
                }

            } )
            .then( editor => {
                window.editor = editor;




            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: qiybqic1scos-2mtgwv7b85hg' );
                console.error( error );
            } );
    </script>
@endsection
