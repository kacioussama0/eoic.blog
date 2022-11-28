@extends('blog-layout.app')
@section('title','تواصل معنا')

@section('content')




    <div class="container">

        <div class="uk-card uk-card-default uk-card-large">

            <div class="uk-card-title p-5">
                <img src="{{asset('imgs/logo.svg')}}" alt="" style="width: 200px" class="uk-margin-auto uk-display-block">
                <h1 class="uk-text-center">تواصل مع المرصد</h1>
            </div>




            <div class="uk-card-body">



                    @if (\Session::has('success'))
                        <div class="uk-alert uk-alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif

                <form action="{{route('contact')}}" method="POST">


                    @csrf

                    <x-forms.input name="name" title="الإسم الكامل :" type="text"/>
                    <x-forms.input name="email" title="البريد الإلكتروني :" type="email"/>
                    <x-forms.input name="subject" title="أدخل الموضوغ" type="subject"/>

                    <div class="uk-margin-bottom">
                        <label for="message" class="uk-label uk-label-success">الرسالة :</label>
                        <textarea name="message" id="message" class="uk-textarea">{{old('message')}}</textarea>
                    </div>

                    <input type="submit" value="إرسال" class="uk-button-primary uk-width-1-1 p-2">
                </form>

            </div>


        </div>


    </div>

@endsection
