@extends('admin.layouts.app')
@section('title','أخر الأخبار')



@section('content')



    @if (\Session::has('success'))
        <div class="alert alert-success">
                <p class="mb-0">{!! \Session::get('success') !!}</p>
        </div>
    @endif



    <a href="{{route('news.create')}}" class="btn btn-lg btn-primary mb-4">إضافة خبر جديد</a>

@if(count($news))
    <div class="table-responsive rounded">

        <table class="table table-striped table-primary border rounded">

            <thead>

                <tr>
                    <th>الخبر</th>
                    <th>منشور</th>
                    <th>تم إنشاءه</th>
                    <th>تم تعديله</th>
                    <th>الإجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach($news as $new)

                    <tr>

                        <td>{{$new->title}}</td>
                        <td>{{($new->is_published) ? 'نعم' : 'لا'}}</td>
                        <td>{{$new->created_at}}</td>
                        <td>{{$new->updated_at}}</td>
                        <td>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    الإجراءات
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{route('news.edit',$new)}}"  class="dropdown-item">تعديل</a></li>
                                    <li>
                                        <form action="{{route('news.destroy',$new)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item">حذف</button>

                                        </form>
                                    </li>


                                </ul>
                            </div>
                        </td>

                    </tr>


                @endforeach

            </tbody>

        </table>



    </div>
@else
    <div class="alert alert-danger">
        <h1 class="text-center">لا يوجد أخبر الأخبار</h1>
    </div>

    @endif
@endsection
