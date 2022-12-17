@extends('blog-layout.app')
@section('title','البطاقات')

@section('style')

<link rel="stylesheet" href="{{asset('assets/photoswipe/photoswipe.css')}}" />


 @endsection


@section('content')




    <div class="page-header ">

        <div class="page-header-bg" style="background-image: url('{{asset('assets/imgs/books.svg')}}')" data-stellar-background-ratio="0.9"></div>
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-md-offset-1 col-md-10 text-center">

                    <h1 class="text-uppercase">{{__('البطاقات')}}</h1>

                    <div class="position-relative ">


                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">

       <div class="container">


           <div class="pswp-gallery pswp-gallery--single-column" id="gallery--getting-started">

               <div class="row g-3">

                   @foreach($cards as $card)
                           <div class="col-md-6 col-lg-4 col-xl-3">
                               <div class="card border-primary overflow-hidden">
                                   <a href="https://unsplash.com"
                                      data-pswp-src="{{asset('storage/' . $card -> image())}}"
                                      data-pswp-width="2500"
                                      data-pswp-height="1666"
                                      target="_blank">
                                       <img src="{{asset('storage/' . $card -> image())}}" class="img-fluid" alt="" />
                                   </a>
                               </div>
                           </div>
                   @endforeach
               </div>

           </div>


           </div>


    </section>



@endsection


@section('script')

    <script type="module">
        // Include Lightbox
        import PhotoSwipeLightbox from '{{asset('assets/photoswipe/photoswipe-lightbox.esm.js')}}';

        const lightbox = new PhotoSwipeLightbox({
            // may select multiple "galleries"
            gallery: '#gallery--getting-started',

            // Elements within gallery (slides)
            children: 'a',


            showHideAnimationType: 'zoom',
            showAnimationDuration: 300,
            hideAnimationDuration: 300,

            // setup PhotoSwipe Core dynamic import
            pswpModule: () => import('{{asset('assets/photoswipe/photoswipe.esm.js')}}')
        });
        lightbox.init();
    </script>
@endsection
