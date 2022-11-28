@extends('blog-layout.app')
@section('title','مقال')
@section('content')



    <div class="page-header ">
        <div class="uk-overlay-primary uk-position-cover"></div>

        <div class="page-header-bg " style="background-image: url('{{asset('storage/' . $post -> image)}}');background-size: cover" data-stellar-background-ratio="0.9"></div>
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-md-offset-1 col-md-10 text-center">

                    <h1 class="text-uppercase" >{{$post -> title}}</h1>

                    <div class="position-relative uk-position-z-index">
                        @foreach($post -> tags as $tag)

                            <a href="{{route('tag.show',$tag)}}" class="badge bg-primary badge-pill">#{{$tag -> name}}</a>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section py-5">

        <div class="container">
            <div class="row">
                <div class="col-md-8 uk-animation-scale-up">

                    <img src="{{asset('storage/' . $post -> image)}}" alt="" class="mb-3">

                    <div style="font-size: 22px" >
                        {!! $post -> content !!}
                    </div>

        @if(count($tags))

                    <div class="tags mb-3">

                        <h3>الوسوم</h3>

                        @foreach($tags as $tag)

                            <a href="{{route('tag.show',$tag -> id)}}" class="badge bg-primary badge-pill">{{$tag -> name}}</a>

                        @endforeach

                    </div>

        @endif

                    @if($next)
                        <a href="{{route('post.slug',$next->slug)}}" class="primary-button my-5"> المقال التالي</a>
                    @endif


                    @if($prev)
                        <a href="{{route('post.slug',$prev->slug)}}" class="secondary-button my-5">المقال الأقدم</a>
                    @endif


                    <div class="more-posts mt-3">

                        <h3 class="title"> المزيد من {{$post -> category -> name}}</h3>

                        <div class="row mt-5" >
                        @foreach($post -> category -> posts -> take(4) as $post)

                            <div class="col-md-6">
                                <x-article :post="$post"/>
                            </div>

                        @endforeach
                        </div>

                    </div>

                </div>
                @include('blog-layout.side')

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <div class="container">


        <div id="disqus_thread"></div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://elyakada.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>

@endsection
