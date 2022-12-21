@extends('admin.layouts.app')
@section('title',__('forms.members'))
@section('icon','bi bi-people-fill')



@section('content')


        <a href="{{route('users.create')}}" class="btn btn-lg btn-primary mb-4">{{__('forms.add-members')}}</a>

    @include('admin.layouts.success')

@if(count($users))
    <div class="table-responsive rounded">

        <table class="table table-striped table-primary border rounded">

            <thead>

                <tr>
                    <th>{{__('forms.full-name')}}</th>
                    <th>{{__('forms.email')}}</th>
                    <th>{{__('forms.picture')}}</th>
                    <th>{{__('forms.articles')}}</th>
                    <th>{{__('forms.created-at')}}</th>
                    <th>{{__('forms.procedures')}}</th>
                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr>
                       <td>{{$user -> name}}</td>
                        <td>{{$user -> email}}</td>
                        <td>
                           <img src="{{!File::exists(public_path('storage/' . $user->avatar)) ?
                            asset('storage/' . $user -> avatar) : asset('assets/imgs/avatar.svg')}}" alt="" style="width: 80px ; height:80px" class="rounded-circle">
                       </td>
                       <td>
                           <a href="{{route('author',$user -> id)}}" class="text-bg-primary p-2 rounded d-inline-block">{{count($user -> posts)}}</a>
                       </td>
                       <td>{{$user -> created_at}}</td>
                       <td>
                           <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                               {{__('forms.procedures')}}
                           </button>
                           <ul class="dropdown-menu">
                               <li> <a href="{{route('users.edit',$user)}}"  class="dropdown-item">{{__('forms.edit')}}</a></li>
                               <li>
                                   <form action="{{route('users.destroy',$user)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block w-100">
                                       @csrf
                                       @method('DELETE')
                                       <button class="dropdown-item">{{__('forms.delete')}}</button>

                                   </form>
                               </li>


                           </ul>
                       </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

        <div class="d-flex align-items-center justify-content-center">{{$users -> links()}}</div>
    </div>

@else
    <div class="alert alert-danger">
        <h1 class="text-center">{{__('forms.empty')}}</h1>
    </div>
@endif
@endsection
