@extends('admin.layouts.app')
@section('title',__('forms.edit-project'))



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
            <form action="{{route('projects.update',$project)}}" method="POST" enctype="multipart/form-data" class="mt-3">
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                        @method('PATCH')
                        @csrf
                        <x-admin.forms.input name="title" title="{{__('forms.title-in-ar')}}" type="text" value="{{$project->title}}"/>
                        <x-admin.forms.text-area name="description" title="{{__('forms.description')}}" value="{!! $project -> description!!}"/>
                        <x-admin.forms.input name="thumbnail" title="{{__('forms.picture')}}" type="file" value="{{old('thumbnail')}}"/>
                        <img src="{{asset('storage/' . $project -> thumbnail)}}" alt="" style="width: 200px ; height: 200px">
                        <x-admin.forms.input name="amount" title="{{__('forms.price')}}" type="number" value="{{$project -> amount}}"/>

                        <div class="form-check form-switch mb-3">
                            <label for="is_published">{{__('forms.share')}}</label>
                            <input class="form-check-input " @if($project -> is_published)  checked @endif type="checkbox" name="is_published" id="is_published" value="on">
                        </div>


                    </div>



                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <x-admin.forms.input name="title_en" title="{{__('forms.title-in-en')}}" type="text" value="{{$project->title_en}}"/>
                        <x-admin.forms.text-area name="description_en" title="{{__('forms.description')}}" value="{!! $project -> description_en !!}"/>
                        <x-admin.forms.input name="thumbnail_en" title="{{__('forms.picture')}}" type="file" value="{{old('thumbnail_en')}}"/>
                        <img src="{{asset('storage/' . $project -> thumbnail_en) }}" alt="" style="width: 200px ; height: 200px">

                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <x-admin.forms.input name="title_fr" title="{{__('forms.title-in-fr')}}" type="text" value="{{$project->title_fr}}"/>
                        <x-admin.forms.text-area name="description_fr" title="{{__('forms.description')}}" value="{!! $project -> description_fr !!}"/>
                        <x-admin.forms.input name="thumbnail_fr" title="{{__('forms.picture')}}" type="file" value="{{old('thumbnail_fr')}}"/>
                        <img src="{{asset('storage/' . $project -> thumbnail_fr) }}" alt="" style="width: 200px ; height: 200px">

                    </div>

                </div>
                <button type="submit" class="btn btn-primary w-100">{{__('forms.edit-project')}}</button>
            </form>

        </div>
    </div>



    <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>


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
