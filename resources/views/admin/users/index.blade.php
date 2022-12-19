@extends('admin.layouts.app')
@section('title','الأعضاء')
@section('icon','bi bi-people-fill')



@section('content')


        <a href="{{route('users.create')}}" class="btn btn-lg btn-primary mb-4">إضافة عضو</a>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}

        </div>
    @endif

@if(count($users))
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
                           <img src="{{!File::exists(public_path('storage/' . $user->avatar)) ?
                            asset('storage/' . $user -> avatar) : asset('assets/imgs/avatar.svg')}}" alt="" style="width: 80px ; height:80px" class="rounded-circle">
                       </td>
                       <td>
                           <a href="{{route('author',$user -> id)}}" class="text-bg-primary p-2 rounded d-inline-block">{{count($user -> posts)}}</a>
                       </td>
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

        <div class="d-flex align-items-center justify-content-center">{{$users -> links()}}</div>
    </div>

@else
    <div class="alert alert-danger">
        <h1 class="text-center">لا يوجد أعضاء</h1>
    </div>
@endif
@endsection
