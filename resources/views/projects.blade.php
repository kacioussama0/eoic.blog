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


           <div class="row g-5 my-3">
               @foreach($projects as $project)

                   <div class="col-md-4">
                       <div class="card shadow border-0 rounded-5  overflow-hidden">

                           <div class="card-body p-3">
                               <img src="" class="card-img-top object-fit-cover h-50" alt="...">
                               <h6 class="display-6 text-center" style="font-family: 'Cairo' !important;">{{$project -> amount}} €</h6>
                               <div class="progress mb-3">
                                   <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                               </div>
                               <a class="btn btn-primary w-100" href="{{route('projects.donate',$project)}}">{{__('forms.donation')}}</a>
                           </div>
                       </div>
                   </div>


                   <div class="col-md-4">
                       <div class="card shadow py-4 p-3 border-0" style="border-radius: 20px">
                           <h5 class="card-title text-center text-primary fw-bolder mb-3">{{$project -> title()}}</h5>
                           <div class="position-relative">
                               <img src="{{asset('storage/' . $project -> thumbnail())}}" class="card-img-top rounded-4" alt="...">
                               <div class="progress w-100 position-absolute rounded-4 start-0 z-1 bottom-0" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                   <div class="progress-bar progress-bar-striped progress-bar-animated rounded-4" style="width: 13%"></div>
                               </div>
                           </div>
                           <div class="card-body vstack gap-4">

                               <div class="amount  d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center">
                                <i class="fa-duotone fa-box-dollar fa-2x me-2 text-secondary"></i>
                                <div>
                                    <h6 class="text-primary m-0">تم جمع</h6>
                                    <p class="m-0 text-muted">0€</p>
                                </div>
                            </span>

                                   <span class="d-flex align-items-center">
                                <i class="fa-duotone fa-coins fa-2x me-2 text-secondary"></i>
                                <div>
                                    <h6 class="text-primary m-0" style="">المبلغ المتبقي</h6>
                                    <p class="m-0 text-muted">{{$project -> amount}} €</p>
                                </div>
                            </span>
                               </div>

                               <form action="" class="">

                                   <div class="input-group shadow-sm">
                                       <div class="input-group-text text-bg-primary">€</div>
                                       <input type="number" class="form-control border-0  px-2  text-start" placeholder="أدخل المبلغ">
                                   </div>

                                   <input  type="submit" class="btn btn-primary rounded-pill bg-gradient px-5 fw-bold mx-auto d-block w-100  mt-3" value="تبرع الأن">
                               </form>

                           </div>

                           <div class="card-footer bg-transparent text-center align-items-center d-flex justify-content-center mt-1 pt-2 border-0">
                               <i class="fa-duotone fa-circle-info fa-2x me-2 text-primary"></i>
                               <a href="#" class="text-decoration-none">تفاصيل المشروع</a>
                           </div>
                       </div>

                   </div>

               @endforeach

           </div>


       </div>

    </section>



@endsection
