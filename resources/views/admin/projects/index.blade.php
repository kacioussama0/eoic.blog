@extends('admin.layouts.app')
@section('title',__('forms.donation-progres'))



@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.failed')

    <a href="{{route('projects.create')}}" class="btn btn-lg btn-primary mb-3">{{__('forms.add-project')}}</a>

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
                                <th>{{__('forms.project-name')}}</th>
                                <th>{{__('forms.description')}}</th>
                                <th>{{__('forms.price')}}</th>
                                <th>{{__('forms.picture')}}</th>
                                <th>{{__('forms.created-at')}}</th>
                                <th>{{__('forms.edited-at')}}</th>
                                <th>{{__('forms.procedures')}}</th>
                            </tr>
                            </thead>

                            <tbody>


                            @foreach($projects as $project)
                                <tr>

                                   <td>{{$project->title}}</td>
                                   <td>{{Str::words($project->description,10)}}</td>
                                   <td>{{$project->amount}} €</td>
                                    <td>
                                        <img src="{{asset('storage/' . $project->thumbnail)}}" alt="" style="width: 100px ;height: 100px">
                                    </td>
                                   <td>{{$project->created_at}}</td>
                                   <td>{{$project->updated_at}}</td>

                                    <td>
                                        <div class="btn-group position-relative z-20">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('forms.procedures')}}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('projects.edit',$project)}}">{{__('تعديل')}}</a></li>
                                                <li>
                                                    <form action="{{route('projects.destroy',$project)}}" method = "POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn">{{__('حذف')}}</button>
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


                    <div class="table-responsive">

                        <table class="table  table-striped align-middle">

                            <thead>
                            <tr>
                                <th>{{__('forms.project-name')}}</th>
                                <th>{{__('forms.description')}}</th>
                                <th>{{__('forms.price')}}</th>
                                <th>{{__('forms.picture')}}</th>
                                <th>{{__('forms.created-at')}}</th>
                                <th>{{__('forms.edited-at')}}</th>
                                <th>{{__('forms.procedures')}}</th>
                            </tr>
                            </thead>

                            <tbody>


                            @foreach($projects as $project)
                                <tr>

                                    <td>{{$project->title_en}}</td>
                                    <td>{{Str::words($project->description_en,10)}}</td>
                                    <td>{{$project->amount}} €</td>
                                    <td>
                                        <img src="{{asset('storage/' . $project->thumbnail_en)}}" alt="" style="width: 100px ;height: 100px">
                                    </td>
                                    <td>{{$project->created_at}}</td>
                                    <td>{{$project->updated_at}}</td>

                                    <td>
                                        <div class="btn-group position-relative z-20">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('forms.procedures')}}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('projects.edit',$project)}}">{{__('تعديل')}}</a></li>
                                                <li>
                                                    <form action="{{route('projects.destroy',$project)}}" method = "POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn">{{__('حذف')}}</button>
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
                <div class="tab-pane fade" id="fr-tab" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">

                    <div class="table-responsive">

                        <table class="table  table-striped align-middle">

                            <thead>
                            <tr>
                                <th>{{__('forms.project-name')}}</th>
                                <th>{{__('forms.description')}}</th>
                                <th>{{__('forms.price')}}</th>
                                <th>{{__('forms.picture')}}</th>
                                <th>{{__('forms.created-at')}}</th>
                                <th>{{__('forms.edited-at')}}</th>
                                <th>{{__('forms.procedures')}}</th>
                            </tr>
                            </thead>

                            <tbody>


                            @foreach($projects as $project)
                                <tr>

                                    <td>{{$project->title_fr}}</td>
                                    <td>{{Str::words($project->description_fr,10)}}</td>
                                    <td>{{$project->amount}} €</td>
                                    <td>
                                        <img src="{{asset('storage/' . $project->thumbnail_fr)}}" alt="" style="width: 100px ;height: 100px">
                                    </td>
                                    <td>{{$project->created_at}}</td>
                                    <td>{{$project->updated_at}}</td>

                                    <td>
                                        <div class="btn-group position-relative z-20">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('forms.procedures')}}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('projects.edit',$project)}}">{{__('تعديل')}}</a></li>
                                                <li>
                                                    <form action="{{route('projects.destroy',$project)}}" method = "POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn">{{__('forms.delete')}}</button>
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
            </div>
        </div>
    </div>



@endsection
