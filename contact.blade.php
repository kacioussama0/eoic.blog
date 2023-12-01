<div>

    <div class="card my-5 border-0">


        <div class="row align-items-center  rounded shadow-sm">
            <div class="col-lg-5 order-2 order-lg-0   border-primary">


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
                    <form wire:submit.prevent="send">

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

                            <label for="subject" class="form-label">{{__('forms.subject')}}</label>
                            <input type="text" name="email" id="email" placeholder="" class="form-control @error('subject') is-invalid @enderror" wire:model="subject">

                            @error('subject' )
                            <span class="text-danger">{{__($message)}}</span>
                            @enderror

                        </div>


                        <div class="">
                            <label for="message" class="uk-label uk-label-success">{{__('forms.message')}}</label>
                            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" wire:model="message"></textarea>
                            @error('message')
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
            <div class="col-lg-7">
                <img src="{{asset('assets/imgs/contact-us.svg')}}" alt="" class="img-fluid">
            </div>

        </div>
    </div>
</div>
