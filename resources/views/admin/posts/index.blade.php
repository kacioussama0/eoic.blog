@extends('admin.layouts.app')

@section('title','المقالات')



@section('content')

    <span class="d-flex justify-content-between flex-sm-row flex-column">
           @permission('posts-create')
            <a href="{{route('posts.create')}}" class="btn btn-lg btn-primary mb-4">إضافة مقال جديد</a>
           @endpermission


            <a href="{{url('admin/junk')}}" class="btn btn-lg btn-danger mb-4">المقالات المحذوفة</a>

    </span>

    @include('admin.layouts.success')


    <div class="card">
        <div >

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="arabic-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><span class="fi fi-sa"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="english-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><span class="fi fi-us"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="frensh-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><span class="fi fi-fr"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                </li>
            </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                        <div class="table-responsive rounded">

                            <table class="table table-striped table-waning border rounded align-middle">

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


                    </div>



                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="table-responsive rounded">

                            <table class="table table-striped border rounded align-middle">

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

                                @foreach($postsEN as $post)

                                    <tr>

                                        <td>{{$post->title_en}}</td>

                                        <td>
                                            <span class="badge bg-secondary p-2" style="font-size: 16px">{{$post->category->name_en}}</span>
                                        </td>
                                        @role('admin')
                                        <th>{{$post -> user-> name}}</th>
                                        @endrole
                                        <td>
                                            <img src="{{!File::exists(public_path($post->image_en)) ? asset('storage/' . $post->image_en) : asset('storage/' . $post->image) }}" alt="" style="width: 80px ; height: 80px ; object-fit: cover ; border-radius: 5Px">
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

                            <div class="d-flex justify-content-center">{{$postsEN-> links()}}</div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <div class="table-responsive rounded">

                            <table class="table table-striped table-waning border rounded align-middle">

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

                                @foreach($postsFR as $post)

                                    <tr>

                                        <td>{{$post->title_fr}}</td>

                                        <td>
                                            <span class="badge bg-secondary p-2" style="font-size: 16px">{{$post->category->name_fr}}</span>
                                        </td>
                                        @role('admin')
                                        <th>{{$post -> user-> name}}</th>
                                        @endrole
                                        <td>
                                            <img src="{{!File::exists(public_path($post->image_fr)) ? asset('storage/' . $post->image_fr) : asset('storage/' . $post->image) }}" alt="" style="width: 80px ; height: 80px ; object-fit: cover ; border-radius: 5Px">
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

                            <div class="d-flex justify-content-center">{{$postsFR -> links()}}</div>
                        </div>

                    </div>

                </div>


        </div>
    </div>






@endsection


