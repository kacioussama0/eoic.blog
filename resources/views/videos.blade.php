@extends('blog-layout.app')
@section('title',__('forms.videos'))

@section('style')

    <style class="embedly-css">
        .card , div.brd  {
            border-radius: 15px;
            overflow: hidden;
        }
        .card .hdr , .card .brd a{
            display:none;

        }
    </style>

 @endsection


@section('content')




    <div class="page-header ">

        <div class="page-header-bg" style="background-image: url('{{asset('assets/imgs/books.svg')}}')" data-stellar-background-ratio="0.9"></div>
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-md-offset-1 col-md-10 text-center">

                    <h1 class="text-uppercase">{{__('forms.videos')}}</h1>

                    <div class="position-relative ">


                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">

       <div class="container">

               <div class="row gy-5">

                   @foreach($videos as $video)


                        <div class="col-md-4">

                            <figure class="media">
                                <oembed url="{{$video -> url}}" allowfullscreen></oembed>
                            </figure>

                        </div>

                   @endforeach

               </div>

            {{$videos->links()}}

           </div>


    </section>



@endsection


@section('script')
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
    <script>
        document.querySelectorAll( 'oembed[url]' ).forEach( element => {
            // Create the <a href="..." class="embedly-card"></a> element that Embedly uses
            // to discover the media.
            const anchor = document.createElement( 'a' );

            anchor.setAttribute( 'href', element.getAttribute( 'url' ) );
            anchor.className = 'embedly-card';

            element.appendChild( anchor );
        } );
    </script>
@endsection
