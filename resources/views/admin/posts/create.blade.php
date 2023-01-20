@extends('admin.layouts.app')
@section('title',__('forms.add-articles'))



@section('content')


    <div class="card">
        <div class="card-body">

                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" class="mt-3">


                        @csrf

                    <span class="fi fi-sa  mx-auto d-block" style="width: 70px; height: 70Px"></span>


                    <x-admin.forms.input name="title" title="{{__('forms.title')}}" type="text" value="{{old('title')}}"/>

                        <div class="form-group">
                            <label for="category" class="form-label">{{__('home.categories')}}</label>
                            <select name="category" id="category" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="tags" class="form-label">{{__('forms.tags')}}</label>

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

                        <x-admin.forms.input name="image" title="{{__('forms.picture')}}" type="file" value="{{old('image')}}"/>
                        <x-admin.forms.text-area name="content" id="#content" class="content" title="article-content-ar"  value="{!!old('content')!!}"/>
                         <hr>
                        <span class="fi fi-gb  mx-auto d-block" style="width: 70px; height: 70Px"></span>

                    <x-admin.forms.input name="title_en" title="{{__('forms.title-in-en')}}" type="text" value="{{old('title_en')}}"/>
                        <x-admin.forms.input name="image_en" title="{{__('forms.picture')}}" type="file" value="{{old('image_en')}}"/>
                        <x-admin.forms.text-area name="content_en" id="content_1" title="article-content-en"  value="{!!old('content_en')!!}"/>
                        <hr>

                    <span class="fi fi-fr mx-auto d-block" style="width: 70px; height: 70Px"></span>

                    <x-admin.forms.input name="title_fr" title="{{__('forms.title-in-fr')}}" type="text" value="{{old('title_fr')}}"/>
                        <x-admin.forms.input name="image_fr" title="{{__('forms.picture')}}" type="file" value="{{old('image_fr')}}"/>
                        <x-admin.forms.text-area name="content_fr" id="content_2" title="article-content-fr"  value="{!!old('content_fr')!!}"/>


                    <div class="mb-3">
                        <input type="datetime-local" class="form-control" name="created_at" value="{{date('Y-m-d H:i')}}">
                    </div>

                        <div class="form-check form-switch mb-3">
                            <label for="is_published">{{__('forms.share')}}</label>
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="on">
                        </div>



                </div>





                </div>
                    <button type="submit" class="btn btn-primary w-100">{{__('forms.add-articles')}}</button>
                </form>

        </div>
    </div>


    <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>


    <script>ClassicEditor
            .create( document.querySelector( '#content' ), {

                licenseKey: '',

                ckfinder: {
                    uploadUrl: "{{route('posts.uploadImage') . '?_token=' . csrf_token()}}",

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
