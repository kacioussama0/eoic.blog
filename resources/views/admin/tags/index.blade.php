@extends('admin.layouts.app')
@section('title','الوسوم')



@section('content')


    @include('admin.layouts.success')
    @include('admin.layouts.failed')


    <form action="{{route('tags.store')}}" method="POST" class="mb-5">

          @csrf
          <x-admin.forms.input name="name" title="إسم الوسم" type="text"  value="{{old('name')}}"/>


            <button type="submit" class="btn btn-warning">إضافة وسم جديد</button>


    </form>


    <div class="table-responsive rounded">

        <table class="table table-striped table-primary border rounded">

            <thead>

                <tr>
                    <th>إسم الوسم</th>
                    <th>تم إنشاءه</th>
                    <th>عدد المقالات</th>
                    <th>تم تعديله</th>
                    <th>الإجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach($tags as $tag)

                    <tr>

                        <td>#{{$tag->name}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td>{{count($tag->posts)}}</td>
                        <td>{{$tag->updated_at}}</td>
                        <td>
                            <form action="{{route('tags.destroy',$tag)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block w-100">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">حذف</button>

                            </form>
                        </td>

                    </tr>


                @endforeach

            </tbody>

        </table>

        <div class="d-flex justify-content-center">{{$tags -> links()}}</div>


    </div>


@endsection
