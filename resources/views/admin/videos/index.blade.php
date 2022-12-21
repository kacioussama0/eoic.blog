@extends('admin.layouts.app')
@section('title','الفيديوهات')



@section('content')



    @if (\Session::has('success'))
        <div class="alert alert-success">
                <p class="mb-0">{!! \Session::get('success') !!}</p>
        </div>
    @endif



    <a href="{{route('videos.create')}}" class="btn btn-lg btn-primary mb-4">إضافة فيديو جديد</a>




    @if(count($videos))
        <div class="table-responsive rounded">

            <table class="table table-striped table-warning border rounded">

                <thead>

                <tr>
                    <th>العنوان</th>
                    <th>منشور</th>
                    <th>تم إنشاءه</th>
                    <th>تم تعديله</th>
                    <th>الإجراءات</th>
                </tr>

                </thead>

                <tbody>

                @foreach($videos as $video)

                    <tr>

                        <td>{{$video->title}}</td>
                        <td>{{$video->is_published ? 'Yes' : 'No'}}</td>
                        <td>{{$video -> created_at}}</td>
                        <td>{{$video -> updated_at}}</td>

                        <td>
                            <a href="{{route('videos.edit',$video)}}" class="btn btn-success">تعديل</a>
                            <form action="{{route('videos.destroy',$video)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block">
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


    </div>

@endsection
