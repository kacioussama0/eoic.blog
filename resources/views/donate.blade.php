@extends('blog-layout.app')
@section('title','تبرع للهيئة')




@section('content')

    <div class="container-lg">
        <h1 class="pt-5 text-center">{{__('forms.donate-to-organisation')}}</h1>

        <img src="{{asset('assets/imgs/ahseno-ayah.svg')}}" alt="" class="mx-auto d-block img-fluid my-5">





        <div class="row justify-content-center align-items-center">

            <div class="col-md-7">
                <img src="{{asset('assets/imgs/donate.svg')}}" alt="" class="img-fluid">
            </div>

            <div class="col-md-5">
                <div class="card border rounded-4 my-5 shadow-sm">
                    <h3 class="card-header bg-transparent text-center p-3">
                        نستقبل تبرعاتكم
                    </h3>
                    <div class="card-body">
                        <p class="text-muted text-center">
                            تعتمد الهيئة في تنفيذ أعمالها وتسيير شؤونها على الموارد الآتية:
                            العطايا بمختلف أنواعها: تبرعات؛ منح؛ وصايا؛ زكوات…الخ.
                            إيرادات الأنشطة التي تنظمها الهيئة.
                            المساهمات المالية التي ترد إلى الهيئة من المؤسسات الخاصة والعامة.
                            مساهمات أخرى يقدمها أعضاءمن الهيئة أو من خارجها.
                            وتتقيد الهيئة في قبول مواردها المالية بالقوانين النافذة في دولة المقر وفي البلدان التي لها فيها فروع.
                        </p>
                        <div id="donate-button-container ">
                            <div id="donate-button" class="d-flex justify-content-center"></div>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>


@endsection

@section('scripts')

        <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
        <script>
            PayPal.Donation.Button({
                env:'production',
                hosted_button_id:'X3HWJZC5KPT4U',
                image: {
                    alt:'Donate with PayPal button',
                    title:'Donate Now',
                }
            }).render('#donate-button');
        </script>
    </div>

@endsection
