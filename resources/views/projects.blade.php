@extends('blog-layout.app')
@section('title',__('forms.projects'))
@section('content')




    <section class="py-5">




       <div class="container">

           <h1 class="text-center">{{__('forms.projects')}}</h1>

           <div class="row g-5">
               @foreach($projects as $project)

                   <div class="col-md-4">
                       <div class="card rounded-5 overflow-hidden">
                           <img src="{{asset('storage/' . $project -> thumbnail())}}" class="card-img-top object-fit-cover  h-50" alt="...">
                           <div class="card-body  ">
                               <h5 class="card-title text-center ">{{$project -> title()}}</h5>
                               <h6 class="display-6 text-center" style="font-family: 'Cairo' !important;">{{$project -> amount}} €</h6>
                               <div class="progress mb-3">
                                   <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                               </div>
                               <a class="btn btn-primary w-100" href="{{route('projects.donate',$project)}}">{{__('forms.donate')}}</a>
                           </div>
                       </div>
                   </div>


               @endforeach

           </div>
       </div>

    </section>



@endsection
