<div class="col-md-4 d-md-block d-none">



    <!-- ad widget-->
    <div class="aside-widget ">
        <a href="#" style="display: inline-block;margin: auto;">
            <div class="section-title">
                <h2 class="title">{{__('home.our-projects')}}</h2>
            </div>
            <img class="img-responsive" src="{{asset('assets/imgs/logo.svg')}}" alt="">
        </a>
    </div>
    <!-- /ad widget -->






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

</div>
</div>
</div>
</div>

