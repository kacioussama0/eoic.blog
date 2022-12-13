@extends('admin.layouts.app')
@section('title',__('إعدادات الموقع'))



@section('content')

    @include('admin.layouts.success')


    <div class="card">
        <div >

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#ar-tab" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><span class="fi fi-sa"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#en-tab" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><span class="fi fi-gb"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#fr-tab" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><span class="fi fi-fr"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                </li>
            </ul>
            <form action="{{route('settings.update',$settings)}}" method="POST" enctype="multipart/form-data">


                @csrf

                @method('PATCH')

                <div class="tab-content p-3" id="myTabContent" >

                    <div class="tab-pane fade  show active" id="ar-tab" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">



                        <x-admin.forms.input name="blog_name" title="{{__('إسم الموقع')}}" type="text" value="{{$settings->blog_name}}"/>
                        <x-admin.forms.input name="slogan" title="{{__('الشعار')}}" type="text" value="{{$settings->slogan}}"/>
                        <x-admin.forms.text-area name="blog_description" title="{{__('التعريف')}}"  value="{!! $settings->blog_description !!}"/>
                        <x-admin.forms.text-area name="vision" title="{{__('الرؤية')}}" type="text" value="{!!$settings->vision!!}"/>
                        <x-admin.forms.text-area name="message" title="{{__('الرسالة')}}" type="text" value="{!!$settings->message!!}"/>
                        <x-admin.forms.text-area name="goals" title="{{__('الأهداف')}}"  value="{!! $settings->goals !!}"/>
                        <x-admin.forms.text-area name="values" title="{{__('القيم')}}"  value="{!! $settings->values !!}"/>

                        <x-admin.forms.input name="email" title="{{__('البريد الإلكتروني')}}" type="email" value="{{$settings->email}}"/>

                        <x-admin.forms.input name="phone" title="{{__('رقم الهاتف')}}" type="tel" value="{{$settings->phone}}"/>
                        <x-admin.forms.input name="address" title="{{__('العنوان')}}" type="text" value="{{$settings->address}}"/>

                    </div>
                    <div class="tab-pane fade" id="en-tab" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">


                        <x-admin.forms.input name="blog_name_en" title="{{__('إسم الموقع')}}" type="text" value="{{$settings->blog_name_en}}"/>
                        <x-admin.forms.input name="slogan_en" title="{{__('الشعار')}}" type="text" value="{{$settings->slogan_en}}"/>
                        <x-admin.forms.text-area name="blog_description_en" title="{{__('التعريف')}}"  value="{!! $settings->blog_description_en !!}"/>
                        <x-admin.forms.text-area name="vision_en" title="{{__('الرؤية')}}" type="text" value="{!!$settings->vision_en!!}"/>
                        <x-admin.forms.text-area name="message_en" title="{{__('الرسالة')}}" type="text" value="{!!$settings->message_en!!}"/>
                        <x-admin.forms.text-area name="goals_en" title="{{__('الأهداف')}}"  value="{!! $settings->goals_en !!}"/>
                        <x-admin.forms.text-area name="values_en" title="{{__('القيم')}}"  value="{!! $settings->values_en !!}"/>

                        <x-admin.forms.input name="email" title="{{__('البريد الإلكتروني')}}" type="email" value="{{$settings->email}}"/>

                        <x-admin.forms.input name="phone" title="{{__('رقم الهاتف')}}" type="tel" value="{{$settings->phone}}"/>
                        <x-admin.forms.input name="address" title="{{__('العنوان')}}" type="text" value="{{$settings->address}}"/>

                    </div>
                    <div class="tab-pane fade" id="fr-tab" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">


                        <x-admin.forms.input name="blog_name_fr" title="{{__('إسم الموقع')}}" type="text" value="{{$settings->blog_name_fr}}"/>
                        <x-admin.forms.input name="slogan_fr" title="{{__('الشعار')}}" type="text" value="{{$settings->slogan_fr}}"/>
                        <x-admin.forms.text-area name="blog_description_fr" title="{{__('التعريف')}}"  value="{!! $settings->blog_description_fr !!}"/>
                        <x-admin.forms.text-area name="vision_fr" title="{{__('الرؤية')}}" type="text" value="{!! $settings->vision_fr !!}"/>
                        <x-admin.forms.text-area name="message_fr" title="{{__('الرسالة')}}" type="text" value="{!!$settings->message_fr!!}"/>
                        <x-admin.forms.text-area name="goals_fr" title="{{__('الأهداف')}}"  value="{!! $settings->goals_fr !!}"/>
                        <x-admin.forms.text-area name="values_fr" title="{{__('القيم')}}"  value="{!! $settings->values_fr !!}"/>

                        <x-admin.forms.input name="email" title="{{__('البريد الإلكتروني')}}" type="email" value="{{$settings->email}}"/>

                        <x-admin.forms.input name="phone" title="{{__('رقم الهاتف')}}" type="tel" value="{{$settings->phone}}"/>
                        <x-admin.forms.input name="address" title="{{__('العنوان')}}" type="text" value="{{$settings->address}}"/>


                    </div>

                </div>
                <button class="btn btn-primary w-100">{{__('تحديث إعدادات الموقع')}}</button>

        </div>







    </form>


    </div>




    <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>
    <script>ClassicEditor
            .create( document.querySelector( '#blog_description' ), {




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

        ClassicEditor
        .create( document.querySelector( '#blog_description_en' ), {

            language: 'en'



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

        ClassicEditor
        .create( document.querySelector( '#blog_description_fr' ), {

            language: 'fr'



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



        ClassicEditor
            .create( document.querySelector( '#vision' ), {




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


        ClassicEditor
            .create( document.querySelector( '#vision_en' ), {


                language: 'en'

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


        ClassicEditor
            .create( document.querySelector( '#vision_fr' ), {


                language: 'fr'

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


        ClassicEditor
            .create( document.querySelector( '#values' ), {




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


        ClassicEditor
            .create( document.querySelector( '#values_en' ), {

                language: 'en'



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


        ClassicEditor
            .create( document.querySelector( '#values_fr' ), {

                language: 'fr'



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



        ClassicEditor
            .create( document.querySelector( '#goals' ), {




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


        ClassicEditor
            .create( document.querySelector( '#goals_en' ), {

                language: 'en'



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

        ClassicEditor
            .create( document.querySelector( '#goals_fr' ), {


                language: 'fr'


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

        ClassicEditor
            .create( document.querySelector( '#message' ), {




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


        ClassicEditor
            .create( document.querySelector( '#message_en' ), {


                language: 'en'

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


        ClassicEditor
            .create( document.querySelector( '#message_fr' ), {


                language: 'fr'

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
