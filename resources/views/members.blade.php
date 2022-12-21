@extends('blog-layout.app')
@section('title','المجلات')
@section('style')

    <link rel="stylesheet" href="{{asset('assets/css/fullpage.min.css')}}" />

    <style>



        .member-card::before {
            content:'';
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            position: absolute;
            top: 0;
            left: 0;
        }

        .member-card img {
            object-position: center;
        }




        .imgs {
            background-position: top center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .imgs::before {
            content:'';
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(27, 28, 30, 0) 0%, rgba(20,130,135,0.8) 90%);
            position: absolute;
            top:0;
            left:0;
        }

    </style>

@endsection
@section('content')

    <div id="fullpage" class="">
        <div class="section " id="section0" >
            <div class="d-flex text-center justify-content-center align-items-center flex-column">
                <i class="fa-light fa-users mb-5" style="font-size: 80px"></i>
                <h1 class="text-uppercase text-white">{{__('أعضاء المكتب التنفيذي')}}</h1>
            </div>

        </div>

        @foreach($members as  $key => $member )


            <div class="section container imgs position-relative" id="section{{$key}}" style="background-image: url('{{asset('storage/' . $member -> avatar )}}')">
                <div class="intro position-absolute start-50 bottom-0 translate-middle">

                    <div>
                        <h3 class="mt-3  display-1 text-white text-center">{{$member -> name}} </h3>
                        <h2 class=" text-bg-secondary text-center m-0 p-3">{{$member -> occupation}}</h2>
                    </div>
                </div>
            </div>


        @endforeach


    </div>





@endsection

@section('script')

    <script src="{{asset('assets/js/fullpage.min.js')}}"></script>

    <script type="text/javascript">
        var myFullpage = new fullpage('#fullpage', {
            sectionsColor: ['#148287', '#F6CA6D','#148287', '#F6CA6D','#148287', '#F6CA6D'],
            anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
            menu: '#menu',

            //equivalent to jQuery `easeOutBack` extracted from http://matthewlein.com/ceaser/
            easingcss3: 'cubic-bezier(0.175, 0.885, 0.320, 1.275)'
        });
    </script>

@endsection
