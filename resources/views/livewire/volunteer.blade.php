<div>

    <h1 class="display-4 text-center  border-0 text-primary">{{__('home.volunteer')}}</h1>


    <div class="card my-5 border-0">


        <div class="row align-items-center border border-primary border-0 rounded shadow-sm ">
            <div class="col-lg-5   border-primary p-3 order-2 order-lg-0">



                <div class="card-body">
                    @if (session()->has('message'))
                        <script>
                            Swal.fire({
                                title: '',
                                text: "{{session('message')}}",
                                icon: 'success',
                                confirmButtonColor: '#148287',
                            })
                        </script>
                    @endif
                    <form wire:submit.prevent="send" enctype="multipart/form-data">

                        <div class="row">

                            <div class="form-group  col-md-6  mb-1 ">

                                <label for="name" class="form-label">{{__('forms.full-name')}}</label>
                                <input type="text" name="name" id="name" placeholder="" class="form-control @error('name') is-invalid @enderror" wire:model="name">

                                @error('name')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror

                            </div>




                            <div class="form-group  col-md-6 mb-1 ">

                                <label for="email" class="form-label">{{__('forms.email')}}</label>
                                <input type="email" name="email" id="email" placeholder="" class="form-control @error('email') is-invalid @enderror" wire:model="email">

                                @error('email')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror

                            </div>


                            <div class="form-group  col-md-12 mb-1 ">

                                <label for="country" class="form-label">{{__('forms.country')}}</label>
                                <input type="text" name="country" id="country" placeholder="" class="form-control @error('country') is-invalid @enderror" wire:model="country">

                                @error('country')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror

                            </div>


                            <div class="form-group col-md-6 mb-1 ">

                                <label for="phone" class="form-label">{{__('forms.phone')}}</label>
                                <input type="tel" name="phone" id="phone" placeholder="" class="form-control @error('phone') is-invalid @enderror" wire:model="phone">

                                @error('phone' )
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror

                            </div>

                            <div class="form-group  col-md-6 mb-1 ">

                                <label for="dob" class="form-label">{{__('forms.dob')}}</label>
                                <input type="date" name="dob" id="dob" placeholder="" class="form-control @error('dob') is-invalid @enderror" wire:model="dob">

                                @error('dob')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror

                            </div>


                            <div class="form-group  col-md-12 mb-1">

                                <label for="gender" class="form-label">{{__('forms.gender')}}</label>

                                <div class="d-flex">
                                <span class="form-check me-3">
                                    <label for="gender" class="form-check-label">{{__('forms.male')}}</label>
                                    <input type="radio" name="gender" id="gender" class="form-check-input  @error('gender') is-invalid @enderror" wire:model="gender" value="ذكر">
                                </span>

                                    <span class="form-check">
                                  <label for="gender" class="form-check-label">{{__('forms.female')}}</label>
                                <input type="radio" name="gender" id="gender" class="form-check-input @error('gender') is-invalid @enderror" wire:model="gender" value="أنثى">
                                </span>
                                </div>

                                @error('gender')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror

                            </div>

                            <div class="form-group col-md-6 mb-1 ">

                                <label for="domain" class="form-label">{{__('forms.areas-of-volunteering')}}</label>
                                <input type="text" name="domain" id="domain" placeholder="" class="form-control @error('domain') is-invalid @enderror" wire:model="domain">

                                @error('domain' )
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror

                            </div>


                            <div class="form-group col-md-6 mb-1">

                                <label for="time" class="form-label">{{__('forms.volunteer-time')}}</label>
                                <input type="text" name="time" id="phone" placeholder="" class="form-control @error('phone') is-invalid @enderror" wire:model="time">

                                @error('time' )
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror

                            </div>


                            <div class="form-group  col-md-12 mb-1">
                                <label for="cv">{{__('forms.cv')}}</label>
                                <input type="file" name="cv" id="cv" class="form-control @error('cv') is-invalid @enderror" wire:model="cv">
                                @error('cv')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror

                            </div>



                        </div>
                        <span class="d-flex">
                            <button type="submit" class="btn btn-outline-primary w-100 my-3">{{__('forms.send')}}
                            <div class="spinner-border text-primary" role="status" wire:loading wire:target="send"></div>
                            </button>

                        </span>

                    </form>
                </div>


            </div>
            <div class="col-lg-7 ">
                <img src="{{asset('assets/imgs/volunteer.svg')}}" alt="" class="img-fluid">
            </div>

        </div>
    </div>
</div>
