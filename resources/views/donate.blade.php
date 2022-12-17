@extends('blog-layout.app')
@section('title','تبرع للهيئة')




@section('content')

    <div class="container-lg">
        <h1 class="py-3 text-center">تبرع للهيئة</h1>

        <p class="text-muted text-center">
            تعتمد الهيئة في تنفيذ أعمالها وتسيير شؤونها على الموارد الآتية:
            العطايا بمختلف أنواعها: تبرعات؛ منح؛ وصايا؛ زكوات…الخ.
            إيرادات الأنشطة التي تنظمها الهيئة.
            المساهمات المالية التي ترد إلى الهيئة من المؤسسات الخاصة والعامة.
            مساهمات أخرى يقدمها أعضاءمن الهيئة أو من خارجها.
            وتتقيد الهيئة في قبول مواردها المالية بالقوانين النافذة في دولة المقر وفي البلدان التي لها فيها فروع.
        </p>

        <div class="row justify-content-center align-items-center">


            <div class="col-md-5">
                <div class="card border rounded-4 my-5 p-3 shadow-sm">
                    <div class="card-body text-center">
                        <img src="{{asset('assets/imgs/logo.svg')}}" alt="" class="mb-3" style="width: 100px">
                        <h3 class="w-50 mx-auto">{{$settings -> display_name()}}</h3>

                        <form action="{{route('donate.process')}}" method="POST">
                             @csrf
                            <input type="number" class="form-control w-50 mx-auto fs-2 text-muted border-0 text-center" id="price" name="price" required step="0.05" placeholder="0.00">
                            <label for="price" class="text-muted mb-3">EURO</label>

                            <button type="submit" class="btn btn-secondary w-100 rounded-pill text-dark py-2">تبرع ب باي بال <i class="fa fa-brands fa-paypal"></i> </button>
                        </form>

                    </div>
                </div>
            </div>


        </div>

    </div>

@endsection
