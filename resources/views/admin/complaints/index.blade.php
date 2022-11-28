@extends('admin.layouts.app')
@section('title','قائمة الشكاوي')



@section('content')




@if(count($complaints))
    <div class="table-responsive rounded">

        <table class="table table-striped table-primary border rounded">

            <thead>

                <tr>
                    <th>الإسم الكامل</th>
                    <th>البريد اللإلكتروني</th>
                    <th>الهاتف</th>
                    <th>نوع الشكوى</th>
                    <th>الإجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach($complaints as $complaint)

                    <tr>

                        <td>{{$complaint->full_name}}</td>
                        <td>{{$complaint->email}}</td>
                        <td>{{$complaint->phone}}</td>
                        <td>{{$complaint->complaint_type}}</td>


                        <td>
                            <a href="{{route('complaints.show',$complaint)}}" class="btn btn-primary">إظهار</a>
                            <form action="{{route('complaints.destroy',$complaint->id)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block">
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
        <h1>لا توجد شكاوي</h1>
    </div>

@endif
@endsection
