@php

    if(config('app.locale') == 'ar') {
              $Articles = \App\Models\Category::where('name','مقالات')->first()->posts->where('title','<>',null)->take(5);
              $Dialogues = \App\Models\Category::where('name','حوارات')->first()->posts->where('title','<>',null)->take(5);

          }
      elseif(config('app.locale') == 'fr') {
            $Articles = \App\Models\Category::where('name_fr','Articles')->first()->posts->where('title_fr','<>',null)->take(5);
            $Dialogues = \App\Models\Category::where('name_fr','Dialogues')->first()->posts->where('title_fr','<>',null)->take(5);
      }else {
            $Articles = \App\Models\Category::where('name_en','Articles')->first()->posts->where('title_en','<>',null)->take(5);
            $Dialogues = \App\Models\Category::where('name_en','Dialogues')->first()->posts->where('title_en','<>',null)->take(5);
      }




  $project = \App\Models\Project::latest()->first();



@endphp

<div class="col-lg-4 order-0 order-lg-1">


@if(!empty($project))
    <!-- ad widget-->
    <div class="aside-widget d-lg-block d-none">
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
                            <a class="btn btn-primary w-100" href="{{route('projects.donate',$project)}}">{{__('forms.donate')}}</a>
                        </div>
                    </div>
        </a>
    </div>
    <!-- /ad widget -->

@endif


@if(request()->is('/'))
    <div class="card  mb-3  border-primary">
        <div class="card-header p-0 bg-transparent  border-primary">
            <h3 class=" my-0 p-3">
                <span class="text-center">
                    <i class="fa-light fa-mosque me-2 text-primary"></i>
                    <span class="">{{__('home.prayer-times')}}</span>
                </span>
                <div class="fw-normal fs-6 mt-2 d-flex justify-content-between flex-column align-items-center"  id="prayer-date">

                </div>

            </h3>
        </div>

        <div class="card-body p-0">
            <ul class="list-group border-0" id="prayers">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{__('home.fajr')}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{__('home.sunrise')}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{__('home.dhuhr')}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{__('home.asr')}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{__('home.maghrib')}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{__('home.isha')}}</span>
                </li>
            </ul>

        </div>

    </div>

@endif

    @if(request()->is('/') )

        @if(count($Articles))
        <div class="card rounded-4  overflow-hidden border-primary mb-3 d-lg-block d-none">
            <div class="card-header p-0 bg-transparent border-primary">
                <h3 class=" my-0 p-3">
                    <a href="{{url('category/Posts')}}" class="link-primary"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2"> {{__('home.posts')}} </a>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($Articles as $post)

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
        @endif
    @if(count($Dialogues))
        <div class="card rounded-4  overflow-hidden border-primary mb-3 d-lg-block d-none">
            <div class="card-header p-0 bg-transparent border-primary">
                <h3 class=" my-0 p-3">
                    <a href="{{url('category/Posts')}}" class="link-primary"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2"> {{__('forms.dialogues')}}</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($Dialogues as $post)

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

    @endif

    @else
    <!-- category widget -->
    <div class="aside-widget ">
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


                            <li><a href="{{url('tag/'.$tag -> id)}}">{{$tag ->name()}}</a></li>

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

@section('scripts')




    <script>

        function dayFr(day) {
            let days = [
                'Dimanche',
                'Lundi',
                'Mardi',
                'Mercredi',
                'Jeudi',
                'Venderedi',
                'Samedi'
            ]

            return days[day];
        }


        function dayAR(day) {
            let days = [
                'الأحد',
                'الإثنين',
                'الثلاثاء',
                'الأربعاء',
                'الخميس',
                'الجمعة',
                'السبت'
            ]

            return days[day];
        }


        function monthFR(month) {
            let months = [
                'Janvier',
                'Fevrier',
                'Mars',
                'Avril',
                'May',
                'Juin',
                'Juillet',
                'Aout',
                'Septembre',
                'Octobre',
                'Novombre',
                'Decembre',
            ]

            return months[month];
        }


        function monthAR(month) {
            let months = [
                'جانفي',
                'فيفري',
                'مارس',
                'أفريل',
                'ماي',
                'جوان',
                'جويلية',
                'أوت',
                'سبتمبر',
                'أوكتوبر',
                'نوفمبر',
                'ديسمبر',
            ]

            return months[month];
        }



        const obj = {
            city: 'Geneva',
            country: 'switzerland',
            method: 1,
            year: new Date().getFullYear(),
            month: new Date().getMonth() + 1,
            day: new Date().getDate(),
        }

        let prayers = [];

        const URL =  `http://api.aladhan.com/v1/calendarByCity?city=${obj.city}&country=${obj.country}&method=${obj.method}&month=${obj.month}&year=${obj.year}`;

        $.ajax({
            url: URL,
            method: 'GET'
        }).done((response)=> {
            prayers = response.data[obj.day - 1];

            let day = '';
            let month = '';

            @if(config('app.locale') == 'ar')

                day = dayAR(new Date().getDay());
                month = monthAR(new Date().getMonth());

            @elseif(config('app.locale') == 'fr')

                day = dayFr(new Date().getDay());
                month = monthFR(new Date().getMonth());


            @else
                day = prayers.date.gregorian.weekday.en;
                month = prayers.date.gregorian.month.en;
            @endif

            let prayerDate = document.querySelector('#prayer-date');

            prayerDate.innerHTML = `

            <span class="text-muted">${day} ${prayers.date.gregorian.day}, ${month} ${prayers.date.gregorian.year}</span>
            <span class="text-muted"> ${prayers.date.hijri.day} ${prayers.date.hijri.month.en}  | ${prayers.date.hijri.year} </span>

            `;

            let timing = document.querySelectorAll('#prayers li');
            let times = [
                prayers.timings.Fajr,
                prayers.timings.Sunrise,
                prayers.timings.Dhuhr,
                prayers.timings.Asr,
                prayers.timings.Maghrib,
                prayers.timings.Isha,
            ]
            for(let time in timing) {
                timing[time].innerHTML += "<span>" + times[time].slice(0,times[time].length - 6)  + "</span>";
            }


        })


    </script>

@endsection
