@extends('admin.layouts.app')
@section('title',__('forms.messages'))



@section('content')


    <form action="{{route('removeAllMessages')}}" method="POST"  onsubmit="return confirm({{__('forms.you-sure')}})" class="mb-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-lg btn-danger">{{__('forms.delete-all-message')}}</button>

    </form>

@if(count($messages))
    <div class="table-responsive rounded">

        <table class="table table-striped table-warning border rounded">

            <thead>

                <tr>
                    <th>{{__('forms.full-name')}}</th>
                    <th>{{__('forms.email')}}</th>
                    <th>{{__('forms.subject')}}</th>
                    <th>{{__('forms.message')}}</th>
                    <th>{{__('forms.procedures')}}</th>
                </tr>

            </thead>

            <tbody>

                @foreach($messages as $message)

                    <tr>

                        <td>{{$message->name}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->subject}}</td>
                        <td>{{$message->message}}</td>

                        <td>
                            <form action="{{route('messages.destroy',$message->id)}}" method="POST" onsubmit="return confirm({{__('forms.you-sure')}})" class="d-inline-block">
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
