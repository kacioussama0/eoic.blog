@extends('blog-layout.app')
@section('title',__('forms.projects'))
@section('content')


    <div class="page-header ">

        <div class="page-header-bg" style="background-image: url('{{asset('assets/imgs/books.svg')}}')" data-stellar-background-ratio="0.9"></div>
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-md-offset-1 col-md-10 text-center">

                    <h1 class="text-uppercase">{{__('forms.projects')}}</h1>

                    <div class="position-relative ">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">




       <div class="container">


           <div class="row g-5">
               @foreach($projects as $project)

                   <div class="col-md-6">
                       <div class="card shadow border-0 rounded-5  overflow-hidden">

                           <div class="card-body p-3">
                               <h5 class="card-header bg-transparent border-0 p-0 text-truncate fs-5 mb-3 text-center ">{{$project -> title()}}</h5>
                               <img src="{{asset('storage/' . $project -> thumbnail())}}" class="card-img-top object-fit-cover h-50" alt="...">
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
