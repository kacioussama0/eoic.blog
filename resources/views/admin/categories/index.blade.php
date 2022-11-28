@extends('admin.layouts.app')
@section('title','التصنيفات')



@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.failed')

    @permission('categories-create')
    <form action="{{route('categories.store')}}" method="POST" class="mb-5">

        @csrf

        <x-admin.forms.input name="category_name" title="إسم التصنيف" type="text"  value="{{old('category_name')}}"/>

        <button type="submit" class="btn btn-warning">إضافة تصنيف جديد</button>

    </form>

    @endpermission

    <div class="table-responsive rounded">

        <table class="table table-striped table-primary border rounded align-middle text-center">

            <thead>

                <tr>
                    <th>إسم التصنيف</th>
                    <th>عدد المقالات</th>
                    <th>تم إنشاءه</th>
                    <th>تم تعديله</th>
                    <th>الإجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach($categories as $category)

                    <tr>

                        <td>{{$category->name}}</td>
                        <td>
                            <span class="badge bg-secondary p-2" style="font-size: 16px">{{count($category->posts)}}</span>

                        </td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td class="d-flex">
                            <a href="{{route('categories.show',$category)}}" class="btn btn-primary me-2">إظهار</a>

                            @permission('categories-delete')
                            <form action="{{route('categories.destroy',$category)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block w-100">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                            @endpermission
                        </td>

                    </tr>


                @endforeach

            </tbody>

        </table>

        <div class="d-flex justify-content-center">{{$categories -> links()}}</div>


    </div>


@endsection
