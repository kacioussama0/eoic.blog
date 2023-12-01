@extends('blog-layout.app')
@section('title',$post['title'])
@section('meta')

    <!--  Twitter Meta Tags -->
    <meta name="twitter:title" content="{{$settings->display_name()}} | {{$post['title']}}">
    <meta name="twitter:description" content="{!! Str::limit(strip_tags($post['content']) ,100) !!}">
    <meta name="twitter:image" content="{{asset('storage/' . $post['image'])}}"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="{{request()->url()}}" />

    <!-- Facebook Meta Tags -->

    <meta property="og:title" content="{{$post['title']}}"/>
    <meta property="og:description" content="{!! Str::limit(strip_tags($post['content']) ,100) !!}"/>
    <meta property="og:image" content="{{asset("storage/" . $post['image'])}}"/>
    <meta property="og:url" content="{{request()->url}}"/>

@endsection
@section('style')
    <style class="embedly-css">
        .card , div.brd  {
            border-radius: 15px;
            overflow: hidden;
        }
        .card .hdr , .card .brd a{
            display:none;
        }
    </style>

    <style>

        img {
            width: 100%;
        }
    </style>

@endsection

@section('content')
	<div dir="{{$post['dir']}}">
    <div class="page-header">

        <div class="page-header-bg" style="background-image: url('{{asset('storage/' . $post['image'])}}');background-size: cover" data-stellar-background-ratio="0.9"></div>
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-md-offset-1 col-md-10 text-center">

                    <h1 class="display-4" >{{$post['title']}}</h1>

                </div>
            </div>
        </div>
    </div>


    <div class="section py-4">

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 overflow-hidden">

                    <div class="post-description d-flex flex-column flex-sm-row  justify-content-between align-items-center mb-3 mb-sm-5 mt-sm-0 mt-5" style="font-size: 25px">
                        <div class="border-start border-5 border-primary ps-2 mb-3 mb-sm-0">
                            {{date_format($post['created_at'],'Y-m-d')}}
                        </div>
                        <div>
                            <a href="https://www.facebook.com/sharer.php?u={{url('posts/share') . '/' . $slug}}" target="_blank" class="me-2" style="color: #4267B2"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.facebook.com/dialog/send?app_id=5303202981&display=popup&link={{url('posts/share/') . $slug}}&redirect_uri={{url('posts/share/') . $slug}}" class="me-2" style="color: #00B2FF"><i class="fa-brands fa-facebook-messenger" ></i></a>
                            <a href="https://api.whatsapp.com/send?text={{$post['title']}} . '%20' . {{url('posts/share') . '/' . $slug}}" class="me-2"><i class="fa-brands fa-whatsapp" style="color: #25D366"></i></a>
                            <a href="https://twitter.com/intent/tweet?text='{{$post['title']}}&url={{url('posts/share') . '/' . $slug}}'" target="_blank" class="me-2" style="color: #1DA1F2"><i class="fa-brands fa-twitter"></i></a>
                        </div>

                    </div>

                    <div style="font-size: 20px" class="w-100" >
                        {!! $post['content'] !!}
                    </div>


                    @auth
                        <a href="" class="btn btn-secondary w-100 my-3 py-2"><i class="fa-light fa-edit me-2"></i>{{__('forms.edit-articles')}}</a>
                    @endauth


       
                  


                    
                </div>

           

            </div>

        </div>

    </div>



@endsection




