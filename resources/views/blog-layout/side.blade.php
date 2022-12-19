@php

$project = \App\Models\Project::latest()->first();
$Posts = \App\Models\Category::where('name','مقالات')->orWhere('name_en','Posts')->orWhere('name_fr','Articles')->first()->posts->take(5);

@endphp
<div class="col-md-4 d-lg-block d-none">


@if(!empty($project))
    <!-- ad widget-->
    <div class="aside-widget ">
        <a href="#" style="display: inline-block;margin: auto;">
            <div class="section-title">
                <h2 class="title">{{__('home.our-projects')}}</h2>
            </div>

                    <div class="card rounded-5 border-0" style="font-size: 14px; width: 150px">
                        <img src="{{asset('storage/' . $project -> thumbnail())}}" class="card-img-top object-fit-cover " alt="..." >
                        <div class="card-body">
                            <h6 class=" text-center" style="font-family: 'Changa' !important;">{{$project -> amount}} €</h6>
                            <div class="progress w-100">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                            </div>
                            <a class="btn btn-primary w-100" href="{{route('projects.donate',$project)}}">{{__('تبرع')}}</a>
                        </div>
                    </div>
        </a>
    </div>
    <!-- /ad widget -->

@endif

    @if(request()->is('/') )


        <div class="card rounded-4  overflow-hidden border-primary mb-3">
            <div class="card-header p-0 bg-transparent border-primary">
                <h3 class=" my-0 p-3">
                    <a href="{{url('category/Posts')}}" class="link-primary"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2"> {{__('home.posts')}} </a>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($Posts as $post)

                        <div class="post post-row border-bottom pb-4 border-primary border-opacity-25">
                            <div>

                                <h3 class="post-title"><a href="{{url('posts/' . $post  -> slug())}}">{{$post -> title()}}</a></h3>
                                <p>{!! Str::limit(strip_tags($post -> content()) ,100)!!}</p>

                                <ul class="post-meta">
                                    <li>{{$post ->created_at -> diffForHumans()}}</li>
                                </ul>

                                <div>

                                </div>

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

        <div class="card rounded-4  overflow-hidden border-primary mb-3">
            <div class="card-header p-0 bg-transparent border-primary">
                <h3 class=" my-0 p-3">
                    <a href="{{url('category/Posts')}}" class="link-primary"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2"> حوارات</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($Posts as $post)

                        <div class="post post-row border-bottom pb-4 border-primary border-opacity-25">
                            <div>

                                <h3 class="post-title"><a href="{{url('posts/' . $post  -> slug())}}">{{$post -> title()}}</a></h3>
                                <p>{!! Str::limit(strip_tags($post -> content()) ,100)!!}</p>

                                <ul class="post-meta">
                                    <li>{{$post ->created_at -> diffForHumans()}}</li>
                                </ul>

                                <div>

                                </div>

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>



    @else
    <!-- category widget -->
    <div class="aside-widget mt-5">
        <div class="section-title">
            <h2 class="title ">{{__('home.categories')}}</h2>
        </div>
        <div class="category-widget">
            <ul>


                @foreach($categories as $category)

                    @if(count($category -> posts))
                        <li><a href="{{route('category.show',$category->name())}}">{{$category -> name()}} </a></li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
    <!-- /category widget -->


        @if(!empty($tags))

        <div class="aside-widget">
            <div class="section-title">
                <h2 class="title">{{__('home.tags')}}</h2>
            </div>
            <div class="category-widget">
                <ul>


                    @foreach($tags as $tag)

                        @if(count($tag -> posts))
                            <li><a href="{{url('tag/'.$tag -> id)}}">{{$tag ->name()}}</a></li>
                        @endif

                    @endforeach

                </ul>
            </div>
        </div>
    @endif
    @endif
</div>
</div>
</div>
</div>

