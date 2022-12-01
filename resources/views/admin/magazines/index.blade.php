@extends('admin.layouts.app')
@section('title','المجلات')



@section('content')



    @if (\Session::has('success'))
        <div class="alert alert-success">
                <p class="mb-0">{!! \Session::get('success') !!}</p>
        </div>
    @endif



    <a href="{{route('magazines.create')}}" class="btn btn-lg btn-primary mb-4">إضافة مجلة جديدة</a>

    <div class="table-responsive text-center">

        <table class="table table-bordered">
            <tr>
                <th>العنوان</th>
                <th>الصورة</th>
                <th>منشور</th>
                <th>تم إنشاءه</th>
                <th>تم تعديله</th>
                <th>الإجراءات</th>
            </tr>

            <tbody>
                @foreach($magazines as $magazine)

                    <tr>

                        <td>{{$magazine->title}}</td>
                        <td>
                            <img src="{{asset('storage/' . $magazine->thumbnail)}}" alt="" style="width: 150px">
                        </td>
                        <td>{{$magazine->is_published ? 'نعم' : 'لا'}}</td>
                        <td>{{$magazine->created_at}}</td>
                        <td>{{$magazine->updated_at}}</td>
                        <td>
                            <div class="btn-group position-relative z-20">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{__('الإجراءات')}}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('magazines.edit',$magazine)}}">{{__('تعديل')}}</a></li>
                                    <li>
                                        <form action="{{route('magazines.destroy',$magazine)}}" method = "POST" onsubmit="return confirm('هل أنت متأكد')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn">{{__('حذف')}}</button>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </td>
                    </tr>

                    </tr>

                @endforeach
            </tbody>
        </table>

    </div>


    </div>

@endsection
