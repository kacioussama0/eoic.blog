@extends('admin.layouts.app')
@section('title',__('forms.magazines'))



@section('content')



    @if (\Session::has('success'))
        <div class="alert alert-success">
                <p class="mb-0">{!! \Session::get('success') !!}</p>
        </div>
    @endif



    <a href="{{route('magazines.create')}}" class="btn btn-lg btn-primary mb-4">{{__('forms.add-magazines')}}</a>



    <div class="card">
        <div class="card-body">

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

                    <div class="table-responsive text-center">

                        <table class="table table-bordered">
                            <tr>
                                <th>{{__('forms.title')}}</th>
                                <th>{{__('forms.picture')}}</th>
                                <th>{{__('forms.published')}}</th>
                                <th>{{__('forms.created-at')}}</th>
                                <th>{{__('forms.edited-at')}}</th>
                                <th>{{__('forms.procedures')}}</th>
                            </tr>

                            <tbody>
                            @foreach($magazines as $magazine)

                                <tr>

                                    <td>{{$magazine->title}}</td>
                                    <td>
                                        <img src="{{asset('storage/' . $magazine->thumbnail)}}" alt="" style="width: 150px">
                                    </td>
                                    <td>{{$magazine->is_published ? __('forms.yes') : __('forms.no')}}</td>
                                    <td>{{$magazine->created_at}}</td>
                                    <td>{{$magazine->updated_at}}</td>
                                    <td>
                                        <div class="btn-group position-relative z-20">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('forms.procedures')}}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('magazines.edit',$magazine)}}">{{__('forms.edit')}}</a></li>
                                                <li>
                                                    <form action="{{route('magazines.destroy',$magazine)}}" method = "POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">
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
                    </div>

                </div>
                <div class="tab-pane fade" id="en-tab" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">


                    <div class="table-responsive text-center">

                        <table class="table table-bordered">
                            <tr>
                                <th>{{__('forms.title')}}</th>
                                <th>{{__('forms.picture')}}</th>
                                <th>{{__('forms.published')}}</th>
                                <th>{{__('forms.created-at')}}</th>
                                <th>{{__('forms.edited-at')}}</th>
                                <th>{{__('forms.procedures')}}</th>
                            </tr>

                            <tbody>
                            @foreach($magazines as $magazine)

                               @if($magazine -> title_en != null)

                                   <tr>

                                       <td>{{$magazine->title_en}}</td>
                                       <td>
                                           <img src="{{asset('storage/' . $magazine->thumbnail_en)}}" alt="" style="width: 150px">
                                       </td>
                                       <td>{{$magazine->is_published ? __('forms.yes') : __('forms.no')}}</td>
                                       <td>{{$magazine->created_at}}</td>
                                       <td>{{$magazine->updated_at}}</td>
                                       <td>
                                           <div class="btn-group position-relative z-20">
                                               <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                   {{__('forms.procedures')}}
                                               </button>
                                               <ul class="dropdown-menu">
                                                   <li><a class="dropdown-item" href="{{route('magazines.edit',$magazine)}}">{{__('forms.edit')}}</a></li>
                                                   <li>
                                                       <form action="{{route('magazines.destroy',$magazine)}}" method = "POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                                                           @csrf
                                                           @method('DELETE')
                                                           <button type="submit" class="btn border-0">{{__('forms.delete')}}</button>
                                                       </form>
                                                   </li>

                                               </ul>
                                           </div>
                                       </td>
                                   </tr>

                               @endif

                            @endforeach
                            </tbody>
                        </table>

                    </div>


                </div>
                <div class="tab-pane fade" id="fr-tab" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                    <div class="table-responsive text-center">

                        <table class="table table-bordered">
                            <tr>
                                <th>{{__('forms.title')}}</th>
                                <th>{{__('forms.picture')}}</th>
                                <th>{{__('forms.published')}}</th>
                                <th>{{__('forms.created-at')}}</th>
                                <th>{{__('forms.edited-at')}}</th>
                                <th>{{__('forms.procedures')}}</th>
                            </tr>

                            <tbody>
                            @foreach($magazines as $magazine)

                                @if($magazine -> title_fr != null)

                                <tr>

                                    <td>{{$magazine->title_fr}}</td>
                                    <td>
                                        <img src="{{asset('storage/' . $magazine->thumbnail_fr)}}" alt="" style="width: 150px">
                                    </td>
                                    <td>{{$magazine->is_published ? __('forms.yes') : __('forms.no')}}</td>
                                    <td>{{$magazine->created_at}}</td>
                                    <td>{{$magazine->updated_at}}</td>
                                    <td>
                                        <div class="btn-group position-relative z-20">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('forms.procedures')}}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('magazines.edit',$magazine)}}">{{__('forms.edit')}}</a></li>
                                                <li>
                                                    <form action="{{route('magazines.destroy',$magazine)}}" method = "POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn border-0">{{__('forms.delete')}}</button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>










@endsection
