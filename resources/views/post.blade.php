@extends('blog-layout.app')
@section('title',$post->title())
@section('meta')

    <!--  Twitter Meta Tags -->
    <meta name="twitter:title" content="{{$settings->display_name()}} | {{$post->title()}}">
    <meta name="twitter:description" content="{!! Str::limit(strip_tags($post -> content()) ,100) !!}">
    <meta name="twitter:image" content="{{asset('storage/' . $post->image())}}"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="{{request()->url()}}" />

    <!-- Facebook Meta Tags -->

    <meta property="og:title" content="{{$post->title()}}"/>
    <meta property="og:description" content="{!! Str::limit(strip_tags($post -> content()) ,100) !!}"/>
    <meta property="og:image" content="{{asset("storage/" . $post->image())}}"/>
    <meta property="og:url" content="{{request()->url()}}"/>

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

    <div class="page-header">

        <div class="page-header-bg" style="background-image: url('{{asset('storage/' . $post -> image())}}');background-size: cover" data-stellar-background-ratio="0.9"></div>
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-md-offset-1 col-md-10 text-center">

                    <h1 class="display-4" >{{$post -> title()}}</h1>

                    <div class="position-relative">
                        @foreach($post -> tags as $tag)
                            <a href="{{route('tag.show',$tag)}}" class="badge bg-primary link-light badge-pill ">#{{$tag -> name()}}</a>
                        @endforeach
                    </div>
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
                            {{date_format($post->created_at,'Y-m-d')}}
                        </div>
                        <div>
                            <a href="https://www.facebook.com/sharer.php?u={{route('post.slug', $post->slug())}}" target="_blank" class="me-2" style="color: #4267B2"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.facebook.com/dialog/send?app_id=5303202981&display=popup&link={{route('post.slug', $post->slug())}}&redirect_uri={{route('post.slug', $post->slug())}}" class="me-2" style="color: #00B2FF"><i class="fa-brands fa-facebook-messenger" ></i></a>
                            <a href="#" class="me-2"><i class="fa-brands fa-whatsapp" style="color: #25D366"></i></a>
                            <a href="https://twitter.com/intent/tweet?text={{$post->title()}}&url={{route('post.slug', $post->slug())}}" target="_blank" class="me-2" style="color: #1DA1F2"><i class="fa-brands fa-twitter"></i></a>
                        </div>

                    </div>

                    <div style="font-size: 20px" class="w-100" >
                        {!! $post -> content() !!}
                    </div>


                    @auth
                        <a href="{{route('posts.edit',$post)}}" class="btn btn-secondary w-100 my-3 py-2"><i class="fa-light fa-edit me-2"></i>{{__('forms.edit-articles')}}</a>
                    @endauth


        @if(count($tags))

                <div class="tags my-4">

                    <h3>{{__('forms.tags')}}</h3>

                    @foreach($tags as $tag)

                        <a href="{{route('tag.show',$tag -> id)}}" class="badge bg-primary link-light badge-pill">#{{$tag -> name()}}</a>

                    @endforeach

                </div>

        @endif

                    <div class="d-flex flex-row-reverse justify-content-between align-items-center">
                        @if($next)
                            <a href="{{route('post.slug',$next->slug())}}" class="btn text-bg-primary btn-lg my-5"> {{__('forms.next-article')}}</a>
                        @endif


                        @if($prev)
                            <a href="{{route('post.slug',$prev->slug())}}" class="btn text-bg-secondary btn-lg   my-5">{{__('forms.previous-article')}}</a>
                        @endif

                    </div>



                    <div class="more-posts mt-3 border-top border-primary border-opacity-25 py-5">

                        <h3 class=""> {{__('forms.more-of')}} {{$post -> category -> name()}}</h3>

                        <div class="row mt-5">
                        @foreach($post -> category -> posts -> where('slug' ,'<>', $post->slug ) -> take(4) as $post)

                            <div class="col-md-6">
                                <x-article :post="$post"/>
                            </div>

                        @endforeach
                        </div>

                    </div>

                </div>

                @include('blog-layout.side')

            </div>

        </div>

    </div>



@endsection




