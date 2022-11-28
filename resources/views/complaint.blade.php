@extends('blog-layout.app')
@section('title','قدم شكوى')



@section('content')




    <div class="container">

        <div class="uk-card uk-card-default uk-card-large">

            <div class="uk-card-title p-5">
                <img src="{{asset('imgs/logo.svg')}}" alt="" style="width: 200px" class="uk-margin-auto uk-display-block">
                <h1 class="uk-text-center">قدم شكوى</h1>
            </div>




            <div class="uk-card-body">



                    @if (\Session::has('success'))
                        <div class="uk-alert uk-alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif

                <form action="{{route('complaint')}}" method="POST" enctype="multipart/form-data">


                    @csrf

                    <x-forms.input name="full_name" title="الإسم الكامل :" type="text"/>
                    <x-forms.input name="email" title="البريد الإلكتروني :" type="email"/>
                    <x-forms.input name="phone" title="رقم الهاتف :" type="tel"/>
                    <x-forms.input name="complaint_type" title="أدخل نوع الشكوى" type="text"/>

                    <div class="uk-margin-bottom">
                        <label for="description" class="uk-label uk-label-success">مضمون الشكوى :</label>
                        <textarea name="description" id="description" class="uk-textarea">{{old('description')}}</textarea>
                        @error('description')
                            <span class="uk-text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <x-forms.input name="attachment" title="الملفات المرفقة" type="file"/>



                    <input type="submit" value="إرسال" class="uk-button-primary uk-width-1-1 p-2">
                </form>

            </div>


        </div>


    </div>

@endsection
