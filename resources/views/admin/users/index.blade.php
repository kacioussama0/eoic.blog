@extends('admin.layouts.app')
@section('title','الأعضاء')
@section('icon','bi bi-people-fill')



@section('content')

    @role('admin')
        <a href="{{route('users.create')}}" class="btn btn-lg btn-primary mb-4">إضافة عضو</a>
    @endrole

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <div class="table-responsive rounded">

        <table class="table table-striped table-primary border rounded">

            <thead>

                <tr>
                    <th>الإسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الصورة</th>
                    <th>عدد المقالات</th>
                    <th>تم إنشاءه</th>
                    <th>الإجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr>
                       <td>{{$user -> name}}</td>
                        <td>{{$user -> email}}</td>
                        <td>
                           <img src="{{!File::exists($user->avatar) ?
                            asset('storage/' . $user -> avatar) :
                            asset('imgs/avatar.svg')}}" alt="" style="width: 80px ; height:80px" class="rounded-circle">
                       </td>
                       <td>{{count($user -> posts)}}</td>
                       <td>{{$user -> created_at}}</td>
                       <td>
                           <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                               الإجراءات
                           </button>
                           <ul class="dropdown-menu">
                               <li> <a href="{{route('users.edit',$user)}}"  class="dropdown-item">تعديل</a></li>
                               <li>
                                   <form action="{{route('users.destroy',$user)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block w-100">
                                       @csrf
                                       @method('DELETE')
                                       <button class="dropdown-item">حذف</button>

                                   </form>
                               </li>


                           </ul>
                       </td>
                    </tr>

                @endforeach

            </tbody>

        </table>


    </div>


@endsection
