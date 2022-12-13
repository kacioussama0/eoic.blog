@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">


                </div>
            </div>
        </div>
    </div>
</div>


<div class="container  ">
    <div class="row justify-content-center ">

        <div class="card  border-0 rounded-0">

            <div class="row align-items-center flex-row-reverse">

                <div class="col-md-6 p-5" >
                    <img src="{{asset('assets/imgs/logo.svg')}}" alt="" style="width: 450px" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h1 class="mb-5  text-dark text-center fw-light">{{$settings -> display_name()}}</h1>

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>                            @csrf
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                    </div>


                </div>
            </div>

        </div>

    </div>
</div>
</div>


@endsection
