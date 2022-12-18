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
        height: 50vh;
        display: flex;
        justify-content: center;
        align-items: center;

    }
    .wave {
        width: 5px;
        height: 70px;
        background: linear-gradient(45deg, #ffc107 , #fff);
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

<div class="loader-container" style="background-image: url('{{asset('assets/imgs/bg-footer.svg')}}')">
    <img src="{{asset('assets/imgs/logo.svg')}}" class="my-2" alt="">
    <h2 class="mt-3 text-white w-75 mx-auto text-center">{{$settings -> display_name()}}</h2>
    <div class="center">
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
