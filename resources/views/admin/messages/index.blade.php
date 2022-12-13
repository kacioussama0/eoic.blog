@extends('admin.layouts.app')
@section('title','قائمة الرسائل')



@section('content')


    <form action="{{url('admin/messages/removeAll')}}" method="POST" onsubmit="return confirm('هل أنت متأكد ? ')" class="mb-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-lg btn-danger">{{__('حذف كل الرسائل')}}</button>

    </form>

@if(count($messages))
    <div class="table-responsive rounded">

        <table class="table table-striped table-warning border rounded">

            <thead>

                <tr>
                    <th>الإسم</th>
                    <th>البريد اللإلكتروني</th>
                    <th>الموضوع</th>
                    <th>الرسالة</th>
                    <th>الإجراءات</th>
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
                            <form action="{{route('messages.destroy',$message->id)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </td>

                    </tr>

                @endforeach
            </tbody>

        </table>


    </div>
@else
    <div class="alert alert-danger py-5 text-center">
        <h1>لا توجد رسائل</h1>
    </div>

@endif
@endsection
