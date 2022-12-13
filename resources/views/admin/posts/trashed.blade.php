@extends('admin.layouts.app')
@section('title','المقالات المحذوفة')



@section('content')


    @include('admin.layouts.success')

@if(count($trashedPosts))
    <div class="table-responsive rounded">

        <table class="table table-striped table-waning border rounded">

            <thead>

                <tr>
                    <th>العنوان</th>
                    <th>التصنيف</th>
                    <th>الصورة</th>
                    <th>تم إنشاءه</th>
                    <th>تم تعديله</th>
                    <th>منشور</th>
                    <th>الإجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach($trashedPosts as $post)

                    <tr>

                        <td>{{$post->title}}</td>
                        <td>1</td>
                        <td>
                            <img src="{{!File::exists($post->image) ? asset('storage/' . $post->image) : asset('imgs/logo.svg') }}" alt="" style="width: 80px ; height: 80px ; object-fit: cover ; border-radius: 5Px">
                        </td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>{{($post->is_published == 'on') ? 'نعم' : 'لا'}}</td>
                        <td>





                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    الإجراءات
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{route('posts.restore',$post->id)}}"  class="dropdown-item">استرجاع</a></li>
                                    <li> <a href="{{route('posts.delete',$post->id)}}"  class="dropdown-item">الحذف النهائي</a></li>

                                </ul>
                            </div>


                        </td>

                    </tr>


                @endforeach

            </tbody>


        </table>

        <div class="d-flex justify-content-center">{{$trashedPosts -> links()}}</div>

    @else
        <div class="alert alert-danger py-5 text-center">
            <h1>لا توجد مقالات محذوفة</h1>
        </div>

    </div>

@endif
@endsection
