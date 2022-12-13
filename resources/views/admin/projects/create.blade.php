@extends('admin.layouts.app')
@section('title','إضافة مشروع')



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
            <form action="{{route('projects.store')}}" method="POST" enctype="multipart/form-data" class="mt-3">
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                        @csrf
                        <x-admin.forms.input name="title" title="العنوان بالعربية" type="text" value="{{old('title')}}"/>
                        <x-admin.forms.text-area name="description" title="الوصف بالعربية" value="{{old('description')}}"/>
                        <x-admin.forms.input name="thumbnail" title="الصورة بالعربية" type="file" value="{{old('thumbnail')}}"/>
                        <x-admin.forms.input name="amount" title="المبلغ" type="number" value="{{old('amount')}}"/>

                        <div class="form-check form-switch mb-3">
                            <label for="is_published">المشروع منشور</label>
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="on">
                        </div>


                    </div>



                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <x-admin.forms.input name="title_en" title="العنوان بالإنجليزية" type="text" value="{{old('title_en')}}"/>
                        <x-admin.forms.text-area name="description_en" title="الوصف  بالإنجلزية" value="{{old('description_fr')}}"/>
                        <x-admin.forms.input name="thumbnail_en" title="الصورة بالإنجلزية" type="file" value="{{old('thumbnail_en')}}"/>

                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <x-admin.forms.input name="title_fr" title="العنوان بالفرنسية" type="text" value="{{old('title_fr')}}"/>
                        <x-admin.forms.text-area name="description_fr" title="الوصف بالفرنسية" value="{{old('description_en')}}"/>
                        <x-admin.forms.input name="thumbnail_fr" title="الصورة بالفرنسية" type="file" value="{{old('thumbnail_fr')}}"/>

                    </div>

                </div>
                <button type="submit" class="btn btn-primary w-100">{{__('إضافة مشروع')}}</button>
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
            .create( document.querySelector( '#description' ), {

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
            .create( document.querySelector( '#description_en' ), {

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
            .create( document.querySelector( '#description_fr' ), {

                licenseKey: '',
                language: 'fr',

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
