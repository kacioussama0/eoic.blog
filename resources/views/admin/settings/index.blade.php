@extends('admin.layouts.app')
@section('title','إعدادات الموقع')



@section('content')



    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif


    <form action="{{route('settings.update',$settings)}}" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PATCH')


        <x-admin.forms.input name="blog_name" title="إسم الموقع" type="text" value="{{$settings->blog_name}}"/>
        <x-admin.forms.input name="email" title="البريد الإلكتروني" type="email" value="{{$settings->email}}"/>
        <x-admin.forms.text-area name="blog_description" title="الوصف"  value="{!! $settings->blog_description !!}"/>
        <x-admin.forms.input name="phone" title="رقم الهاتف" type="tel" value="{{$settings->phone}}"/>
        <x-admin.forms.input name="address" title="العنوان" type="text" value="{{$settings->address}}"/>

        <button class="btn btn-primary w-100">تحديث إعدادات الموقع</button>

    </form>
    <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>
    <script>ClassicEditor
            .create( document.querySelector( '#blog_description' ), {

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
