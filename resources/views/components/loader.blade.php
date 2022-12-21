@php

$settings  = \App\Models\Setting::first();

@endphp
<style>

    .loader-container {
        width: 100%;
        height: 100vh;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-blend-mode: color-burn;
        position: fixed;
        background-color: rgba(20,130,135,0.99);
        top: 0;
        left: 0;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .loader-container::before {
        content: '';
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.4);
        position: absolute;
        left: 0;
        z-index: -1;
        top: 0;
    }
    .loader-container img {
        width: 20%;

    }

    @media (max-width: 767px) {
        .loader-container img {
            width: 50%;

        }

    }

    bodY {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .center {

        display: flex;
        justify-content: center;
        align-items: center;

    }
    .wave {
        width: 5px;
        height: 70px;
        background: linear-gradient(80deg, #ffc107 , #fff);
        margin: 10px;
        animation: wave 1s linear infinite;
        border-radius: 20px;
    }
    .wave:nth-child(2) {
        animation-delay: 0.1s;
    }
    .wave:nth-child(3) {
        animation-delay: 0.2s;
    }
    .wave:nth-child(4) {
        animation-delay: 0.3s;
    }
    .wave:nth-child(5) {
        animation-delay: 0.4s;
    }
    .wave:nth-child(6) {
        animation-delay: 0.5s;
    }
    .wave:nth-child(7) {
        animation-delay: 0.6s;
    }
    .wave:nth-child(8) {
        animation-delay: 0.7s;
    }
    .wave:nth-child(9) {
        animation-delay: 0.8s;
    }
    .wave:nth-child(10) {
        animation-delay: 0.9s;
    }

    @keyframes wave {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
    }



</style>

<div class="loader-container " style="background-image: url('{{asset('assets/imgs/bg-footer.svg')}}')">
    <div class="position-absolute start-50 top-50 translate-middle w-100 d-flex flex-column justify-content-center align-items-center">


        <img src="{{asset('assets/imgs/logo.svg')}}" class="img-fluid mb-4 user-select-none" alt="">
        <h2 class="text-white w-75 mx-auto text-center mb-4 user-select-none">{{$settings -> display_name()}}</h2>
        <div class="center mt-3">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>


    </div>

</div>
