@extends('blog-layout.app')
@section('title','من نحن')

<style>
    .fi:not(header .fi) {
        width: 100% !important;
        height: 150px !important;
    }

    header .fi {
        margin-bottom: 5px;
    }

    .card-header {
        background: #fff !important;
        text-align: center;
    }
</style>

@section('content')

    <div class="container py-5">

        <h3 class="mb-5"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2">{{__('home.who-we-are')}}</h3>



        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{__('who.name')}}
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <h1 class="display-5 text-center">{{$settings -> display_name()}}</h1>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        {{__('who.slogan')}}
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <h2 class="display-6">{{$settings->slogan()}}</h2>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        {{__('who.definition')}}

                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!! $settings -> description() !!}

                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        {{__('who.vision')}}
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!! $settings -> vision() !!}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        {{__('who.goals')}}
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!! $settings -> goals() !!}

                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        {{__('who.our-values')}}
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!! $settings -> values() !!}

                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        {{__('who.message')}}
                    </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!! $settings -> message() !!}

                    </div>
                </div>
            </div>
        </div>


        <h3 class="my-5" id="beneficiaries"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2"> {{__('who.beneficiaries')}}</h3>

        <div class="table-responsive">
            @if(session()->get('locale') == 'ar')

            <table class="table table-bordered rounded">
                <tr class="table-primary">
                    <th>{{__('الجهات المستفادة')}}</th>
                    <th>{{__('المطلوب من التعامل معها')}}</th>
                </tr>

                <tr>
                    <td>الأئمة والدعاة</td>
                    <td>{{__('تأهيلهم ورفع كفاءتهم ومعالجة الصعوبات')}}</td>
                </tr>

                <tr>
                    <td>{{__('المراكز الإسلامية')}}</td>
                    <td>{{__('تطوير أداءها ودعوة القائمين عليها إلى الاتحاد')}}</td>
                </tr>

                <tr>
                    <td>{{__('مؤسسات المجتمع المدني الأوروبية المسلمة والغير مسلمة والمؤسسات الحكومية.')}}</td>
                    <td>{{__('البحث عن شراكات وتعاون وتنسيق معهم في إنجاز مشاريع مشتركة')}}</td>
                </tr>

                <tr>
                    <td>{{__('العلماء والمؤسسات الخيرية والداعمون')}}</td>
                    <td>{{__('التنسيق لتبني مشاريع الهيئة طلباً لدعمهم ووقوفهم مع الهيئة ومساندتها')}}</td>
                </tr>

                <tr>
                    <td>{{__('الإعلام والإعلاميون')}}</td>
                    <td>{{__('إيصال صوت الهيئة للجالية والمراكز الإسلامية والدعاة والرأي العام الأوروبي والإسلامي')}}</td>
                </tr>

                <tr>
                    <td>{{__('المسلمون الجدد')}}</td>
                    <td>{{__('تقديم الرعاية والتوجيه لهم')}}</td>
                </tr>



                <tr>
                    <td>{{__('طلاب العلم')}}</td>
                    <td>{{__('العناية بهم وإعدادهم لتحمل مسؤولياتهم في إدارة المراكز الاسلامية')}}</td>
                </tr>

            </table>


                @elseif(session()->get('locale') == 'en')

                <table class="table table-bordered rounded">
                    <tr class="table-primary">
                        <th>{{__('Beneficiaries')}}</th>
                        <th>{{__('we are required to deal with')}}</th>
                    </tr>

                    <tr>
                        <td>Imams and preachers</td>
                        <td>Rehabilitating them, raising their efficiency and addressing their difficulties</td>

                    </tr>

                    <tr>
                        <td>Islamic Centers</td>
                        <td>
                            Developing their performances and inviting those who are responsible to be united.
                        </td>

                    </tr>

                    <tr>
                        <td>Muslim and non Muslim European civil society and governmental institutions</td>
                        <td>
                            Aiming at partnership and coordination with them in order to realize common projects.
                        </td>

                    </tr>

                    <tr>
                        <td>Scholars, charity institutions and supporters</td>
                        <td>
                            Using coordination in order that organization’s projects will be adopted through claiming their support and help.
                        </td>

                    </tr>

                    <tr>
                        <td>Media and journalists</td>
                        <td>
                            Spreading the organization’s voice to the community, to the Islamic Centers, to the scholars and to Islamic and European public opinion.
                        </td>

                    </tr>

                    <tr>
                        <td>New Muslims</td>
                        <td>
                            Offering them care and guidance
                        </td>

                    </tr>

                    <tr>
                        <td>Students</td>
                        <td>
                            Taking care of them and preparing them to honour their responsibilities in Islamic centers’ management.
                        </td>

                    </tr>
                </table>


            @else

                <table class="table table-bordered rounded">
                    <tr class="table-primary">
                        <th>{{__('Les parties prenantes')}}</th>
                        <th>{{__('L’obligation de collaborer avec elles.')}}</th>
                    </tr>

                    <tr>
                        <td>Les Imams et les prêcheurs</td>
                        <td>Les réhabiliter tout en développant leurs compétences et en dissipant les obstacles.</td>

                    </tr>

                    <tr>
                        <td>Les Centres Islamiques</td>
                        <td>
                            Développer leur rendement et appeler les personnes qui y sont en charge à s’unir.
                        </td>

                    </tr>

                    <tr>
                        <td>Les organismes de la société civile Européenne Musulmane et Non Musulmane ainsi que les organismes gouvernementaux</td>
                        <td>
                            Chercher des partenariats, des collaborations et une coordination avec eux dans le but de bâtir des projets communs.
                        </td>

                    </tr>

                    <tr>
                        <td>Les savants, les associations caritatives et les donateurs </td>
                        <td>
                            Coordonner avec eux pour le parrainage des projets de l’Organisation en quête de leur soutien et de leur prise de position à nos côtés.
                        </td>

                    </tr>

                    <tr>
                        <td>Les médias et les journalistes</td>
                        <td>
                            Acheminer la voix de l’Organisation auprès de la communauté, auprès des prêcheurs et de l’opinion publique Européenne et Musulmane.
                        </td>

                    </tr>

                    <tr>
                        <td>Les nouveaux Musulmans</td>
                        <td>

                            Leur assurer un soutien et une orientation
                        </td>

                    </tr>

                    <tr>
                        <td>Les étudiants en théologie</td>
                        <td>
                            S’occuper d’eux et les préparer à la gestion des Centres Islamiques.
                        </td>

                    </tr>
                </table>


            @endif
        </div>



        <h3 class="my-5" id="countries"><img src="{{asset('assets/imgs/zellig.svg')}}" style="width: 30px" alt="" class="me-2"> {{__('who.countries')}}</h3>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5  gy-5">
                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.switzerland')}}</h4>
                       <i class="fi fi-ch card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.france')}}</h4>
                        <i class="fi fi-fr card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.italy')}}</h4>
                        <i class="fi fi-it card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.spain')}}</h4>
                        <i class="fi fi-es card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.austria')}}</h4>
                        <i class="fi fi-at card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.sweden')}}</h4>
                        <i class="fi fi-se card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.germany')}}</h4>
                        <i class="fi fi-de card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.czech')}}</h4>
                        <i class="fi fi-cz card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.malta')}}</h4>
                        <i class="fi fi-mt card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.macedonia')}}</h4>
                        <i class="fi fi-mk card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.hungary')}}</h4>
                        <i class="fi fi-hu card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.ukraine')}}</h4>
                        <i class="fi fi-ua card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.ireland')}}</h4>
                        <i class="fi fi-ie card-img-top img-fluid"></i>
                    </div>
                </div>


                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.denmark')}}</h4>
                        <i class="fi fi-dk card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.britain')}}</h4>
                        <i class="fi fi-gb card-img-top img-fluid"></i>
                    </div>
                </div>


                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.belgium')}}</h4>
                        <i class="fi fi-be card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.romania')}}</h4>
                        <i class="fi fi-ro card-img-top img-fluid"></i>
                    </div>
                </div>

                <div class="col border-0">
                    <div class="card border-0">
                        <h4 class="card-header border-0">{{__('who.finland')}}</h4>
                        <i class="fi fi-fi card-img-top img-fluid"></i>
                    </div>
                </div>

            <div class="col">
                <div class="card border-0">
                    <h4 class="card-header border-0">{{__('who.kosovo')}}</h4>
                    <i class="fi fi-xk card-img-top img-fluid"></i>
                </div>
            </div>


            <div class="col ">
                <div class="card border-0">
                    <h4 class="card-header border-0">{{__('who.netherlands')}}</h4>
                    <i class="fi fi-nl card-img-top img-fluid"></i>
                </div>
            </div>

        </div>

    </div>
@endsection
