@extends('blog-layout.app')

@section('content')


    <div class="section">

        <div class="container">

            <div class="row py-5">

                <div class="col-md-8">

                    <h1 class="mb-5"> نتائج البحث عن {{"\"$word\""}}</h1>

                @if(count($posts))

                    @foreach($posts as $post)

                        <div class="post post-row">
                            <a class="post-img" href="{{url('/posts/' . $post -> slug())}}"><img src="{{\Illuminate\Support\Facades\File::exists('storage/' . $post -> image) ? asset('storage/' . $post -> image) : asset('assets/imgs/logo.svg')}}" alt="" class="rounded" style="height: 200px !important;"></a>
                            <div class="post-body">

                                <h3 class="post-title"><a href="{{url('posts/' . $post  -> slug())}}">{{$post -> title()}}</a></h3>
                                <p class="text-truncate">{!! Str::limit(strip_tags($post -> content()) ,100)!!}</p>

                                <ul class="post-meta">
                                    <li><a href="{{url('category/' . $post -> category -> name())}}">{{$post -> category -> name()}}</a></li>
                                    <li>{{$post ->created_at -> diffForHumans()}}</li>

                                </ul>
                                <div class="mt-3">
                                    @foreach($post -> tags as $tag)

                                        <a href="{{route('tag.show',$tag -> id)}}" class="badge bg-primary link-light badge-pill">#{{$tag -> name()}}</a>

                                    @endforeach
                                </div>
                                <div>

                                </div>

                            </div>
                        </div>


                    @endforeach


                    @else
                        <h2>{{__('لا يوجد نتائج للبحث')}}</h2>
                    @endif

                </div>

                @include('blog-layout.side')



        </div>
    </div>
    </div>


@endsection
