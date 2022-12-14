@extends('admin.layouts.app')
@section('title',__('forms.cards'))



@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.failed')

    <a href="{{route('cards.create')}}" class="btn btn-lg btn-primary mb-3">{{__('forms.add-card')}}</a>
    @if(count($cards))
    <div class="card">
        <div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#ar-tab" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><span class="fi fi-sa"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#en-tab" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><span class="fi fi-gb"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#fr-tab" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><span class="fi fi-fr"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade  show active" id="ar-tab" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">


                    <div class="table-responsive">

                        <table class="table  table-striped align-middle">

                            <thead>
                            <tr>
                                <th>{{__('forms.cards')}}</th>
                                <th>{{__('forms.created-at')}}</th>
                                <th>{{__('forms.edited-at')}}</th>
                                <th>{{__('forms.procedures')}}</th>
                            </tr>
                            </thead>

                            <tbody>


                            @foreach($cards as $card)
                                <tr>

                                    <td>
                                        <img src="{{asset('storage/' . $card -> image)}}" style="width:150px"/>
                                    </td>

                                    <td>{{$card->created_at}}</td>
                                    <td>{{$card->updated_at}}</td>


                                    <td>
                                        <div class="btn-group position-relative ">
                                            <button type="button" class="btn btn-primary dropdown-toggle z-20" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('forms.procedures')}}
                                            </button>
                                            <ul class="dropdown-menu ">
                                                <li><a class="dropdown-item " href="{{route('cards.edit',$card)}}">{{__('forms.edit')}}</a></li>
                                                <li>
                                                    <form action="{{route('cards.destroy',$card)}}" method = "POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn border-0">{{__('forms.delete')}}</button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach





                            </tbody>

                        </table>

                        <div class="d-flex justify-content-center">{{$cards -> links()}}</div>

                    </div>

                </div>
                <div class="tab-pane fade" id="en-tab" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">


                    <div class="table-responsive">

                        <table class="table table-striped align-middle">

                            <thead>
                            <tr>
                                <th>{{__('forms.cards')}}</th>
                                <th>{{__('forms.created-at')}}</th>
                                <th>{{__('forms.edited-at')}}</th>
                                <th>{{__('forms.procedures')}}</th>
                            </tr>
                            </thead>

                            <tbody>


                            @foreach($cardsEN as $card)
                                <tr>

                                    <td>
                                        <img src="{{asset('storage/' . $card -> image_en)}}" />
                                    </td>

                                    <td>{{$card->created_at}}</td>
                                    <td>{{$card->updated_at}}</td>


                                    <td>
                                        <div class="btn-group position-relative z-20">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('forms.procedures')}}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('cards.edit',$card)}}">{{__('forms.edit')}}</a></li>
                                                <li>
                                                    <form action="{{route('cards.destroy',$card)}}" method = "POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn border-0">{{__('forms.delete')}}</button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach





                            </tbody>

                        </table>

                        <div class="d-flex justify-content-center">{{$cardsEN -> links()}}</div>

                    </div>


                </div>
                <div class="tab-pane fade" id="fr-tab" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">

                    <div class="table-responsive">

                        <table class="table table-striped align-middle">

                            <thead>
                            <tr>
                                <th>{{__('forms.cards')}}</th>
                                <th>{{__('forms.created-at')}}</th>
                                <th>{{__('forms.edited-at')}}</th>
                                <th>{{__('forms.procedures')}}</th>
                            </tr>
                            </thead>

                            <tbody>


                            @foreach($cardsFR as $card)
                                <tr>

                                    <td>
                                        <img src="{{asset('storage/' . $card -> image_fr)}}"  style="width:200px;height: 200px"/>
                                    </td>

                                    <td>{{$card->created_at}}</td>
                                    <td>{{$card->updated_at}}</td>


                                    <td>
                                        <div class="btn-group position-relative z-20">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('forms.procedures')}}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('cards.edit',$card)}}">{{__('forms.edit')}}</a></li>
                                                <li>
                                                    <form action="{{route('cards.destroy',$card)}}" method = "POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn border-0">{{__('forms.delete')}}</button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach




                            </tbody>

                        </table>

                        <div class="d-flex justify-content-center">{{$cardsFR -> links()}}</div>

                    </div>


                </div>

                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger display-6 text-center">{{__('forms.empty')}}</div>
     @endif
    </div>



@endsection
