<div class="col-md-4">

        <div class="d-flex align-items-center justify-content-between mb-5">


            <span class="uk-width-1-1 d-flex align-items-center">
                <label for="search"><i class="fa fa-search "></i></label>
            <form action="{{route('search')}}" method="GET">
                        <input type="search" name="result" class="uk-input uk-width-1-1 search" id="search" placeholder="بحث">
            </form>
            </span>

        </div>


    <!-- ad widget-->
    <div class="aside-widget ">
        <a href="#" style="display: inline-block;margin: auto;">
            <div class="section-title">
                <h2 class="title">للإعلانات</h2>
            </div>
            <img class="img-responsive" src="{{asset('imgs/logo.svg')}}" alt="">
        </a>
    </div>
    <!-- /ad widget -->



    <!-- social widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">مواقع التواصل</h2>
        </div>
        <div class="my-3">
            <a href="https://twitter.com/marsad_elyakada?ref_src=twsrc%5Etfw" class="twitter-follow-button " data-show-count="false">Follow @marsad_elyakada</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>    <!-- /social widget -->

        </div>

        <div class="mb-3">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmarsad.elyakada&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=3303718453247757" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

        </div>

    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">التصنيفات</h2>
        </div>
        <div class="category-widget">
            <ul>


                @foreach($categories as $category)

                    <li><a href="{{route('category.show',$category->name)}}">{{$category -> name}} <span>{{count($category -> posts)}}</span></a></li>


                @endforeach

            </ul>
        </div>
    </div>
    <!-- /category widget -->


        @if(!empty($tags))

        <div class="aside-widget">
            <div class="section-title">
                <h2 class="title">الوسوم</h2>
            </div>
            <div class="category-widget">
                <ul>


                    @foreach($tags as $tag)

                        <li><a href="{{url('tag/'.$tag -> id)}}">{{$tag -> name}} <span>{{count($tag -> posts)}}</span></a></li>


                    @endforeach

                </ul>
            </div>
        </div>
    @endif

</div>
</div>
</div>
</div>

