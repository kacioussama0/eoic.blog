@extends('blog-layout.app')

@section('content')
<div class="container  ">
    <div class="row justify-content-center ">

            <div class="card border border-none">

                <div class="row align-items-center">

                    <div class="col-md-6 bg-secondary p-5" >
                        <img src="{{asset('imgs/logo.svg')}}" alt="" style="width: 450px" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h1 class="mb-5  text-center fw-light">مرصد اليقظة لحقوق الإنسان والقضايا العادلة</h1>
                            <form method="POST" action="{{ route('login') }}" >
                                @csrf


                                    <div class=" form-floating mb-3 ">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <label for="email" >البريد الإلكتروني</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>




                                    <div class=" form-floating">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <label for="password" >كلمة السر</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>






                                @if (Route::has('password.request'))
                                    <a class="btn btn-link my-3" href="{{ route('password.request') }}">
                                        هل نسيت كلمة السر ?
                                    </a>
                                @endif



                                        <button type="submit" class="btn btn-primary d-block w-100">
                                            دخول
                                        </button>

                            </form>
                                    </div>


                        </div>
                    </div>

                </div>

            </div>
    </div>
</div>
@endsection
