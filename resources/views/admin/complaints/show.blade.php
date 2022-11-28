@extends('admin.layouts.app')
@section('title',   'الشكوى  رقم ' . $complaint -> id)



@section('content')

    <div class="card border  border-secondary border-2">

        <h3 class="card-header bg-primary text-light" >{{$complaint->full_name}}</h3>

        <div class="card-body mt-3 ">

            <div class="row mb-3">

                    <div class="col-md border-start border-warning">
                         الإسم الكامل {{$complaint -> full_name}}
                    </div>

                    <div class="col-md border-start border-warning">
                        البريد الإلكتروني{{$complaint -> email}}
                    </div>


            </div>

            <div class="row  mb-5">

                <div class="col-md border-start border-warning">
                    رقم الهاتف{{$complaint -> phone}}
                </div>

                <div class="col-md border-start border-warning">
                    نوع الشكوى{{$complaint -> complaint_type}}
                </div>


            </div>

            <div class="row  mb-3">

                <div class="col-md ">
                    <div class="border-start border-warning">
                        مضمون الشكوى
                    </div>
                    <p class="mt-3">
                        {{$complaint -> description}}
                    </p>
                </div>



            </div>

            @if(!File::exists($complaint -> attachment))

                <a href="{{asset('storage/' . $complaint -> attachment)}}">تحميل المرفقات</a>

            @endif

        </div>

    </div>
@endsection
