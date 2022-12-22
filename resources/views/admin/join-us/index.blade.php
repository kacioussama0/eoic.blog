@extends('admin.layouts.app')
@section('title',__('forms.list-of-requests'))



@section('content')




    @if(count($joins))

    <div class="table-responsive rounded">

        <table class="table table-striped table-primary border rounded">

            <thead>

                <tr>
                    <th>{{__('forms.full-name')}}</th>
                    <th>{{__('forms.email')}}</th>
                    <th> {{__('forms.phone')}}</th>
                    <th>{{__('forms.dob')}}</th>
                    <th>{{__('forms.gender')}}</th>
                    <th>{{__('forms.cv')}}</th>
                    <th>{{__('forms.procedures')}}</th>
                </tr>

            </thead>

            <tbody>

                @foreach($joins as $join)

                    <tr>
                        <td>{{$join -> name}}</td>
                        <td>{{$join -> email}}</td>
                        <td>{{$join -> phone}}</td>
                        <td>{{$join -> dob}}</td>
                        <td>{{$join -> gender}}</td>
                        <td>
                            <a href="{{asset('storage/' . $join -> cv)}}" class="btn btn-primary" download>{{__('forms.download')}} </a>
                        </td>
                        <td>
                            <form action="{{route('join-us.destroy',$join)}}" method="POST" onsubmit="return confirm({{__('forms.you-sure')}})" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{__('forms.delete')}}</button>
                            </form>
                        </td>

                    </tr>

                @endforeach
            </tbody>

        </table>

    </div>

    @else
        <div class="alert alert-danger py-5 text-center">
            <h1>{{__('forms.empty')}}</h1>
        </div>

    @endif


@endsection
