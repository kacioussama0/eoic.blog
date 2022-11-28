@extends('admin.layouts.app')
@section('title','المقالات')



@section('content')

    <span class="d-flex justify-content-between">
           @permission('posts-create')
            <a href="{{route('posts.create')}}" class="btn btn-lg btn-primary mb-4">إضافة مقال جديد</a>
           @endpermission


            <a href="{{url('admin/trashed-posts')}}" class="btn btn-lg btn-danger mb-4">المقالات المحذوفة</a>

    </span>

    @include('admin.layouts.success')


    <div class="table-responsive rounded">

        <table class="table table-striped table-waning border rounded text-center">

            <thead>

                <tr>
                    <th>العنوان</th>
                    <th>التصنيف</th>
                    @role('admin')
                    <th>من طرف</th>
                    @endrole
                    <th>الصورة</th>
                    <th>تم إنشاءه</th>
                    <th>تم تعديله</th>
                    <th>منشور</th>
                    <th>الإجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach($posts as $post)

                    <tr>

                        <td>{{$post->title}}</td>

                        <td>
                            <span class="badge bg-secondary p-2" style="font-size: 16px">{{$post->category->name}}</span>
                        </td>
                        @role('admin')
                        <th>{{$post -> user-> name}}</th>
                        @endrole
                        <td>
                            <img src="{{!File::exists($post->image) ? asset('storage/' . $post->image) : asset('imgs/logo.svg') }}" alt="" style="width: 80px ; height: 80px ; object-fit: cover ; border-radius: 5Px">
                        </td>



                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>{{($post->is_published == 'on') ? 'نعم' : 'لا'}}</td>
                        <td>





                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    الإجراءات
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('posts.show',$post)}}" class="dropdown-item">إظهار</a></li>
                                    <li> <a href="{{route('posts.edit',$post)}}"  class="dropdown-item">تعديل</a></li>
                                    @permission('posts-delete')

                                    <li>
                                        <form action="{{route('posts.destroy',$post)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item">حذف</button>

                                        </form>
                                    </li>
                                    @endpermission
                                </ul>

                            </div>


                        </td>

                    </tr>


                @endforeach

            </tbody>

        </table>

        <div class="d-flex justify-content-center">{{$posts -> links()}}</div>
    </div>


@endsection
