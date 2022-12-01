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

        <div class="fb-page" data-href="https://www.facebook.com/MEDIA.EOIC" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/MEDIA.EOIC" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MEDIA.EOIC">‎الهيئة الأوروبية للمراكز الإسلامية‎</a></blockquote></div>

    <!-- category widget -->
    <div class="aside-widget mt-5">
        <div class="section-title">
            <h2 class="title ">التصنيفات</h2>
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

