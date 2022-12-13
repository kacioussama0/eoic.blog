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

    <iframe id="iframe" title="prayerWidget" class="widget-m-top" style=" height: 358px; border: 1px solid #ddd;" scrolling="no" src="https://www.islamicfinder.org/prayer-widget/44345994/shafi/1/0/18.0/17.0"> </iframe>


    <!-- social widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">{{__('home.social-media')}}</h2>
        </div>


        <div class="fb-page" data-href="https://www.facebook.com/MEDIA.EOIC" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/MEDIA.EOIC" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MEDIA.EOIC">‎الهيئة الأوروبية للمراكز الإسلامية‎</a></blockquote></div>

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

