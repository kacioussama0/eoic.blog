@extends('admin.layouts.app')
@section('title',__('forms.office-members'))



@section('content')

    <span class="d-flex justify-content-between">
            <a href="{{route('organization-members.create')}}" class="btn btn-lg btn-primary mb-4">{{__('forms.add-members')}}</a>
    </span>

    @include('admin.layouts.success')


    <div class="table-responsive rounded">

        <table class="table table-striped table-waning border rounded">

            <thead>

                <tr>
                    <th>{{__('forms.full-name')}}</th>
                    <th>{{__('forms.latin-name')}}</th>
                    <th>{{__('forms.age')}}</th>
                    <th>{{__('forms.picture')}}</th>
                    <th>{{__('forms.profession')}}</th>
                    <th>{{__('forms.created-at')}}</th>
                    <th>{{__('forms.procedures')}}</th>
                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> name_latin}}</td>
                        <td>{{$user -> age}}</td>
                        <td>
                            <img src="{{asset('storage/' . $user -> avatar)}}" alt="" style="width: 100px; height: 100px ; object-fit: cover" class="rounded-circle ">
                        </td>

                        <td>{{$user -> occupation}}</td>
                        <td>{{$user -> created_at}}</td>
                        <td>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{__('forms.procedures')}}
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{route('organization-members.edit',$user)}}"  class="dropdown-item">{{__('forms.edit')}}</a></li>
                                    <li>
                                        <form action="{{route('organization-members.destroy',$user)}}" method="POST" onsubmit="return confirm('{{__('forms.you-sure')}}')" class="d-inline-block w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item">{{__('forms.delete')}}</button>

                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$users -> links()}}
    </div>
@endsection
