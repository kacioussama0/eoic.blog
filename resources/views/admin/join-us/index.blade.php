@extends('admin.layouts.app')
@section('title','قائمة طلبات الإنخراط')



@section('content')




    @if(count($joins))

    <div class="table-responsive rounded">

        <table class="table table-striped table-primary border rounded">

            <thead>

                <tr>
                    <th>الإسم الكامل</th>
                    <th>تاريخ ومكان الميلاد</th>
                    <th>رقم الهاتف</th>
                    <th>البريد الإلكتروني</th>
                    <th>تم إنشاءه</th>
                    <th>الإجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach($joins as $join)

                    <tr>

                        <td>{{$join -> full_name}}</td>
                        <td>{{$join -> date_of_birth . ' ب : ' . $join -> place_of_birth}}</td>
                        <td>{{$join -> phone}}</td>
                        <td>{{$join -> email}}</td>
                        <td>{{$join -> created_at}}</td>
                        <td>
                            <a href="{{url('admin/join-us/' . $join->id)}}" class="btn btn-warning">إظهار</a>
                            <form action="{{url('admin/join-us/' . $join->id)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block">
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
            <h1>لا توجد طلبات</h1>
        </div>

    @endif


@endsection
