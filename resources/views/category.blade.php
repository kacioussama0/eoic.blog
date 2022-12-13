@extends('blog-layout.app')
@section('title',$category -> name())

@section('content')


    <div class="page-header bg-primary" >
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-md-10 text-center">
                        <h1 class="text-uppercase">{{$category -> name()}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-8">

                    @if(count($category -> posts))


                    @foreach($posts as $post)
                            @if(!empty($post -> title()))
                                <x-article :post="$post"/>
                            @endif
                    @endforeach

                        <div class="section-row loadmore text-center">
                            {{$posts->links()}}

                        </div>

                    @else
                        <h2 class="alert alert-warning">{{__('لا يوجد مقالات')}}</h2>

                    @endif
                    </div>



                @include('blog-layout.side')

                </div>


            </div>
        </div>



@endsection
