@extends('blog-layout.app')

@section('content')


    <div class="section">

        <div class="container">

            <div class="row py-5">

                <div class="col-md-8">
                @if(count($posts))

                    @foreach($posts as $post)

                        <div class="post post-row">
                            <a class="post-img" href="{{url('/posts/' . $post -> slug())}}"><img src="{{asset('storage/' . $post -> image)}}" alt="" class="rounded"></a>
                            <div class="post-body">

                                <h3 class="post-title"><a href="{{url('posts/' . $post  -> slug())}}">{{$post -> title()}}</a></h3>
                                <ul class="post-meta">
                                    <li><a href="{{url('category/' . $post -> category -> name())}}">{{$post -> category -> name()}}</a></li>
                                    <li>{{$post ->created_at -> diffForHumans()}}</li>
                                </ul>
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
