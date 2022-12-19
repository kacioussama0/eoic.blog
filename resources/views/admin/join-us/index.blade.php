@extends('admin.layouts.app')
@section('title','قائمة طلبات الإنخراط')



@section('content')




    @if(count($joins))

    <div class="table-responsive rounded">

        <table class="table table-striped table-primary border rounded">

            <thead>

                <tr>
                    <th>الإسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>تاريخ الميلاد</th>
                    <th>الجنس</th>
                    <th>السيرة الذاتية</th>
                    <th>الإجراءات</th>
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
                            <a href="{{asset('storage/' . $join -> cv)}}" class="btn btn-primary" download>تحميل </a>
                        </td>
                        <td>
                            <form action="{{route('join-us.destroy',$join)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block">
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
