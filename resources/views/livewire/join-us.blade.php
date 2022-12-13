<div>

    <div class="card my-5 border-0">


        <div class="row align-items-center border border-primary rounded shadow">
            <div class="col-md-6   border-primary">


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

                        <div class="form-group mb-1 ">

                            <label for="name" class="form-label">{{__('forms.full-name')}}</label>
                            <input type="text" name="name" id="name" placeholder="" class="form-control @error('name') is-invalid @enderror" wire:model="name">

                            @error('name')
                            <span class="text-danger">{{__($message)}}</span>
                            @enderror

                        </div>




                        <div class="form-group mb-1 ">

                            <label for="email" class="form-label">{{__('forms.email')}}</label>
                            <input type="email" name="email" id="email" placeholder="" class="form-control @error('email') is-invalid @enderror" wire:model="email">

                            @error('email')
                            <span class="text-danger">{{__($message)}}</span>
                            @enderror

                        </div>


                        <div class="form-group mb-1 ">

                            <label for="phone" class="form-label">{{__('forms.phone')}}</label>
                            <input type="tel" name="phone" id="phone" placeholder="" class="form-control @error('phone') is-invalid @enderror" wire:model="phone">

                            @error('phone')
                            <span class="text-danger">{{__($message)}}</span>
                            @enderror

                        </div>

                        <div class="form-group mb-1 ">

                            <label for="dob" class="form-label">{{__('forms.dob')}}</label>
                            <input type="date" name="dob" id="dob" placeholder="" class="form-control @error('dob') is-invalid @enderror" wire:model="dob">

                            @error('dob')
                            <span class="text-danger">{{__($message)}}</span>
                            @enderror

                        </div>


                        <div class="form-group mb-1">

                            <label for="gender" class="form-label">{{__('forms.gender')}}</label>

                            <div class="d-flex">
                                <span class="form-check me-3">
                                    <label for="gender" class="form-check-label">{{__('forms.male')}}</label>
                                    <input type="radio" name="gender" id="gender" class="form-check-input  @error('gender') is-invalid @enderror" wire:model="gender" value="ذكر">
                                </span>

                                <span class="form-check">
                                  <label for="gender" class="form-check-label">{{__('forms.female')}}</label>
                                <input type="radio" name="gender" id="gender" class="form-check-input @error('gender') is-invalid @enderror" wire:model="gender" value="أتثى">
                                </span>
                            </div>

                            @error('gender')
                            <span class="text-danger">{{__($message)}}</span>
                            @enderror

                        </div>

                        <div class="form-group mb-1">
                            <label for="cv">{{__('forms.cv')}}</label>
                            <input type="file" name="cv" id="cv" class="form-control @error('cv') is-invalid @enderror" wire:model="cv">
                            @error('cv')
                            <span class="text-danger">{{__($message)}}</span>
                            @enderror

                        </div>

                        <span class="d-flex">
                            <button type="submit" class="btn btn-outline-primary w-100 my-3">{{__('forms.send')}}
                            <div class="spinner-border text-primary" role="status" wire:loading wire:target="send"></div>
                            </button>

                        </span>

                    </form>
                </div>


            </div>
            <div class="col-md-6 ">
                <img src="{{asset('assets/imgs/contact-us.svg')}}" alt="" class="img-fluid">
            </div>

        </div>
    </div>
</div>
